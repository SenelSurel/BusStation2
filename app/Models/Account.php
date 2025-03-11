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


//public function user(): BelongsTo
//{
//return $this->belongsTo(User::class, 'email', 'email');
//}
public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(Tank::class, 'user_id', 'id');
}
}
