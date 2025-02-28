<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $table = 'tanks';

    protected $fillable = ['ticketImage','midWeek','weekEnd','fromWhere','toWhere','depart','arrive'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
