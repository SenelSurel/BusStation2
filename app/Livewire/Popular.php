<?php

namespace App\Livewire;

use App\Models\Station;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Popular extends Component
{
    public $stations = [];
    public $currency = 'try';
    public $currencySymbol = '₺';
    protected $exchangeRates = [];
    protected $listeners = ['currencyChanged' => 'updateCurrency'];


    public function mount(): void
    {
        $this->stations = Station::with(['direction','destination'])->select(
            'id',
            'brandLogo',
            'departureTime',
            'arrivalTime',
            'schedule',
            'price',
            'amount',
            'direction_id',
            'destination_id'
        )->inRandomOrder()->limit(6)->get();

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

    public function render()
    {
        return view('livewire.popular');
    }
}
