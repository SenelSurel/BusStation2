<?php

namespace App\Livewire;

use App\Models\Content;
use Livewire\Component;

class Contents extends Component
{
    public $contents;

    public function mount(): void
    {
        $this->contents = Content::query()->select('contentImage', 'contentTitle', 'contentText')->get();
    }
    public function render()
    {
        return view('livewire.contents');
    }
}
