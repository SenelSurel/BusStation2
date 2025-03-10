<?php

namespace App\Livewire\Auth;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterAccount extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $validated = $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:accounts,email',
            'password' => 'required|min:6|max:255|confirmed',
        ]);

        $account = Account::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::guard('accounts')->login($account);
        session()->regenerate();

        return $this->redirect('/index');
    }
    public function render()
    {
        return view('livewire.auth.register-account');
    }
}
