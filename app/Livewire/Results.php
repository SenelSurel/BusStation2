<?php

namespace App\Livewire;

use App\Models\Station;
use App\Models\Tank;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Results extends Component
{


    public $stations;
    public $tickets = [];
    public $resultsVisible = false;
    protected $listeners =
        ['ticketPurchased' => 'loadTickets'];

    public function mount(): void
    {
        $this->stations = Station::query()->select(
            'id',
            'brandLogo',
            'departureTime',
            'arrivalTime',
            'price'
        )->get();
        $this->loadTickets();
    }

    public function loadTickets(): void
    {
        $this->tickets = Tank::where('user_id', auth()->id())->get();
    }
    public function render()
    {
        return view('livewire.results');
    }
}
