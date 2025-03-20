<?php

namespace App\Livewire;

use App\Models\Station;
use App\Models\Districts;
use Livewire\Component;
use Livewire\WithPagination;

class Popular extends Component
{
    public $stations = [];

    public function mount(): void
    {
        //Tekrardan kullanılacak olan modeller ilişkiliyse with ile kullanılır.
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
    }
    public function render()
    {
        return view('livewire.popular');
    }
}
