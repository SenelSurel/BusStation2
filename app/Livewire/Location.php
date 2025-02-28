<?php

namespace App\Livewire;

use App\Models\Districts;
use App\Models\Station;
use Livewire\Component;


class Location extends Component
{
    public $locations = [];
    public $stations = [];
    public $from = null;
    public $to = null;
    public $resultsVisible = false;

    public function mount(): void
    {
        $this->locations = Districts::all();
    }

    public function findLocation(): void
    {
        if (!$this->from && !$this->to) {
            session()->flash('error', 'Lütfen kalkış ve varış noktalarını seçin.');
            return;
        }

        $this->stations = Station::where('direction_id', $this->from)
            ->where('destination_id', $this->to)
            ->get();

        $this->locations = Districts::where('city', $this->from)->where('city',$this->to)->get();

        if ($this->stations->isEmpty()) {
            session()->flash('error', 'Seçtiğiniz rotaya uygun bilet bulunamadı.');
             $this->stations = null;
             return;
        }

        $this->resultsVisible = true;
    }

    public function render()
    {
        return view('livewire.location', [
            'locations' => $this->locations,
            'stations' => $this->stations
        ]);
    }
}
