<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public $services;

    public function mount():void
    {
        $this->services = Service::query()->select(['serviceImage','serviceTitle', 'serviceText'])->get();
    }

    public function render()
    {
        return view('livewire.services');
    }
}
