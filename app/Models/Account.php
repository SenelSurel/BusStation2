<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
use Notifiable;

protected $fillable = [
'username',
'email',
'password',
];

protected $hidden = [
'password',
'remember_token',
];


public function user()
{
return $this->belongsTo(User::class, 'email', 'email');
}
}
