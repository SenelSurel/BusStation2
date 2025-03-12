<?php

namespace App\Livewire;


use App\Models\Tank;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Ticket extends Component
{

    public $myTickets = [];


    public function mount(): void
    {
       $this->getTickets();

    }

    public function getTickets():void {
        $userId = Auth::guard('accounts')->id();

        $this->myTickets = Tank::query()
            ->where('user_id', $userId)
            ->select(
                'id',
                'ticketImage',
                'midWeek',
                'weekEnd',
                'fromWhere',
                'toWhere',
                'depart',
                'arrive')->get();
    }

    public function useTicket($id)
    {
        $userId = Auth::guard('accounts')->id();
        Tank::query()->where('id', $id)->where('user_id', $userId)->delete();

        $this->getTickets();

        session()->flash('redirect_code', true);

        return redirect('/code');
    }
    public function render()
    {
        return view('livewire.ticket');
    }
}
