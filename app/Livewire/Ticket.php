<?php

namespace App\Livewire;

use App\Models\Station;
use App\Models\Tank;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Ticket extends Component
{
    public $stations;
    public $myTickets = [];

    public function mount(): void
    {
        $this->myTickets =
            Tank::query()->select(
   'ticketImage',
            'midWeek',
            'weekEnd',
            'fromWhere',
            'toWhere',
            'depart',
            'arrive')->get();

    }
    public function render()
    {
        return view('livewire.ticket', [
            'tickets' => $this->myTickets,
        ]);
    }
}
