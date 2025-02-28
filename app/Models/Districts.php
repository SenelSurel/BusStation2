<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
  protected $table = 'districts';

  protected $fillable = ['city'];

    public function stationsAsDirection(): Districts|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Station::class, 'direction_id');
    }

    public function stationsAsDestination(): Districts|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Station::class, 'destination_id');
    }
}
