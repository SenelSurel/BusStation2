<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginAccount extends Component
{
    public $email;
    public $password;
    public function mount(): void
    {
        if (Auth::guard('accounts')->check()) {
            $this->dispatch('redirect', url:route('index'));
        }
    }
    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if (!Auth::guard('accounts')->attempt($validated)) {
            $this->addError('email', "Giriş başarısız. Lütfen bilgilerinizi kontrol edin.");

        }
        //session()->regenerate();
        return redirect()->to(route('index'));
    }
    public function render()
    {
        return view('livewire.auth.login-account');
    }
}
