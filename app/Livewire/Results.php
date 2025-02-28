<?php

namespace App\Livewire;

use App\Models\Station;
use App\Models\Tank;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Results extends Component
{
    public $stations;
    public $tickets = [];

    protected $listeners = ['ticketPurchased' => 'loadTickets'];

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

    public function buyTicket($id): void
    {
        $pass = Station::find($id);

        if (!$pass) {
            session()->flash('error', 'Bilet bulunamadı.');
            return;
        }

        $existingTicket = Tank::where([
            'ticketImage' => $pass->brandLogo,
            'depart' => $pass->departureTime,
        ])->first();

        if ($existingTicket) {
            session()->flash('error', 'Bu bileti zaten satın aldınız !');
            return;
        }

        Tank::create([
            'ticketImage' => $pass->brandLogo,
            'midWeek' => $pass->schedule === 'haftaIci' ? 1 : 0,
            'weekEnd' => $pass->schedule === 'haftaSonu' ? 1 : 0,
            'depart' => $pass->departureTime,
            'arrive' => $pass->arrivalTime ?? null,
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Bilet başarıyla satın alındı!');
        $this->dispatch('ticketPurchased');
    }

    public function render()
    {
        return view('livewire.results', [
            'stations' => $this->stations
        ]);
    }
}
