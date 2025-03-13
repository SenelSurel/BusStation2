<?php

namespace App\Livewire;

use App\Models\Districts;
use App\Models\Station;
use App\Models\Tank;
use Filament\Forms\Components\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;


class Location extends Component
{
    public $schedule = 'haftaIci';
    public $locations = [];
    public $stations = [];
    public $from = null;
    public $to = null;
    public $resultsVisible = false;
    public  $isLoading = false;



    protected $listeners = [
      'bought' => '$refresh',
    ];

    public function mount(): void
    {
        $this->locations = Districts::all();
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

        $pass = Station::find($id);

       if (!$pass) {
            session()->flash('error', 'Bilet bulunamadı.');
            return;
        }

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
            'ticketImage' => $pass->brandLogo,
            'midWeek' => $pass->schedule === 'haftaIci' ? 1 : 0,
            'weekEnd' => $pass->schedule === 'haftaSonu' ? 1 : 0,
            'fromWhere' => $pass->direction->city,
            'toWhere' =>  $pass->destination->city,
            'depart' => $pass->departureTime,
            'arrive' => $pass->arrivalTime ?? null,

        ]);

        session()->flash('message', 'Bilet satın alındı!');
        $this->dispatch('ticketPurchased');
    }

    public function updatedSchedule($value): void
    {
        $this->schedule = $value;
        $this->findLocation();
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

        $query->where('direction_id', $this->from)
            ->where('destination_id', $this->to);

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
        return view('livewire.location', [
            'locations' => $this->locations,
            'stations' => $this->stations,
            'schedule' => $this->schedule,
        ]);
    }
}
