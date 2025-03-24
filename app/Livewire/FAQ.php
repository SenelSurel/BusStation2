<?php

namespace App\Livewire;

use App\Models\Faqs;
use Livewire\Component;

class FAQ extends Component
{
    public $faqs;

    public function mount(): void
    {
        $this->faqs = Faqs::query()->select(['question', 'answer'])->get();
    }

    public function render()
    {
        return view('livewire.f-a-q');
    }
}
