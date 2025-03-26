<?php

namespace App\Livewire;

use App\Models\Districts;
use App\Models\Station;
use App\Models\Tank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;


class Location extends Component
{
    public $schedule = 'haftaIci';
    public $locations = [];
    public $stations = [];
    public $from = null;
    public $to = null;
    public $currency = 'try';
    public $currencySymbol = '₺';
    protected $exchangeRates = [];
    public $resultsVisible = false;
    public  $isLoading = false;

    protected $listeners = [
        'bought' => '$refresh',
        'currencyChanged' => 'updateCurrency'
    ];


    public function mount(): void
    {
        $this->locations = Districts::all();
        $this->fetchExchangeRates();
    }
    public function fetchExchangeRates(): void
    {
        $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/try.json');
        if ($response->successful()) {
            $this->exchangeRates = $response->json()['try'];
        }
    }

    public function updateCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function getConvertedPrice($price): string
    {
        $basePrice = floatval($price);

        switch ($this->currency) {
            case 'try':
                $convertedPrice = $basePrice;
                $this->currencySymbol = '₺';
                break;
            case 'usd':
                $convertedPrice = $basePrice * ($this->exchangeRates['usd'] ?? 1);
                $this->currencySymbol = '$';
                break;
            case 'eur':
                $convertedPrice = $basePrice * ($this->exchangeRates['eur'] ?? 1);
                $this->currencySymbol = '€';
                break;
            case 'gbp':
                $convertedPrice = $basePrice * ($this->exchangeRates['gbp'] ?? 1);
                $this->currencySymbol = '£';
                break;
            default:
                $convertedPrice = $basePrice;
                $this->currencySymbol = '₺';
        }

        return number_format($convertedPrice, 2, '.', '');
    }
    #[On('findLocation')]
    public function placeholder()
    {
        return view('components.loading-placeholder');
    }

    #[On('buyTicket')]
    public function updateSeats(): void
    {
        $this->stations = Station::query()->select('amount')->get();
        $this->reset('amount');
    }
    public function buyTicket($id): void
    {
        $station = Station::find($id);
        if($station -> amount>0) {
            $station-> amount -=1;
            $this->dispatch('bought');
            $station -> save();
        }else {
            session()->flash('error', 'Otobüs Dolu!');
            return;
        }

        $userId= Auth::guard('accounts')->id();

        Tank::create([
            'user_id' => $userId,
            'ticketImage' => $station->brandLogo,
            'midWeek' => $station->schedule === 'haftaIci' ? 1 : 0,
            'weekEnd' => $station->schedule === 'haftaSonu' ? 1 : 0,
            'fromWhere' => $station->direction->city,
            'toWhere' =>  $station->destination->city,
            'depart' => $station->departureTime,
            'arrive' => $station->arrivalTime ?? null,
        ]);

        session()->flash('message', 'Bilet satın alındı!');
        $this->dispatch('ticketPurchased');
    }

    public function updatedSchedule($value): void
    {
        $this->schedule = $value;
    }
    public function findLocation(): void
    {
        $this->isLoading = true;

        if (!$this->from || !$this->to) {
            session()->flash('error', 'Lütfen kalkış ve varış noktalarını seçin.');
            $this->isLoading = false;
            return;
        }

        $this->dispatch('findLocation');

        $query = Station::query();

        $query->where('direction_id', $this->from)->where('destination_id', $this->to);

        if ($this->schedule) {
            $query->where('schedule', $this->schedule);
        }
        $this->stations = $query->get();

        if ($this->from === $this->to) {
            session()->flash('error', "Lütfen kalkış ve varış noktalarınızı doğru belirleyiniz");
            return;
        }

        if ($this->stations->isEmpty()) {
            session()->flash('error', 'Seçtiğiniz rotaya uygun bilet bulunamadı.');
            $this->stations = [];
        }else{
            $this->resultsVisible = true;
        }

        $this->isLoading = false;
    }
    public function render()
    {
        return view('livewire.location');
    }
}
