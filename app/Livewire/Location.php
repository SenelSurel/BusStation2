<?php

namespace App\Livewire;

use App\Models\Districts;
use App\Models\Station;
use App\Models\Tank;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Location extends Component
{
    public $schedule = 'haftaIci';
    public $locations = [];
    public $stations = [];
    public $from = null;
    public $to = null;
    public $resultsVisible = false;

    public function mount(): void
    {
        $this->locations = Districts::all();
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
            'fromWhere' => $pass->direction->city,
            'toWhere' =>  $pass->destination->city,
            'depart' => $pass->departureTime,
            'arrive' => $pass->arrivalTime ?? null,
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Bilet başarıyla satın alındı!');
        $this->dispatch('ticketPurchased');
    }

    public function updatedSchedule($value): void
    {
        $this->schedule = $value;
        $this->findLocation();
    }
    public function findLocation(): void
    {

        if (!$this->from || !$this->to) {
            session()->flash('error', 'Lütfen kalkış ve varış noktalarını seçin.');
            return;
        }

        $query = Station::query();

        $query->where('direction_id', $this->from)
            ->where('destination_id', $this->to);

        if ($this->schedule) {
            $query->where('schedule', $this->schedule);
        }

        $this->stations = $query->get();

        if ($this->stations->isEmpty()) {
            session()->flash('error', 'Seçtiğiniz rotaya uygun bilet bulunamadı.');
            $this->stations = [];
            return;
        }

        $this->resultsVisible = true;
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
