<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Station extends Model
{


    protected $table = 'stations';

    protected $fillable = ['brand','brandLogo','departureTime','arrivalTime','schedule','price','user_id','destination_id','direction_id','amount'];

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Districts::class, 'direction_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Districts::class, 'destination_id');
    }

}
