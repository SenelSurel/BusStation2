<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginAccount extends Component
{
    public $email;
    public $password;


    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if (!Auth::guard('accounts')->attempt($validated)) {
            $this->addError('email', "Giriş başarısız. Lütfen bilgilerinizi kontrol edin.");
            return;
        }

        session()->regenerate();
        return $this->redirect('/index');
    }
    public function render()
    {
        if (Auth::guard('accounts')->check()) {
            return redirect()->to('/index');
        }
        return view('livewire.auth.login-account');
    }
}
