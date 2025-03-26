<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public $contacts;

    public function mount(){
        $this->contacts = Contact::query()->select('introduce','vision','email','phone','address')->get();
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
