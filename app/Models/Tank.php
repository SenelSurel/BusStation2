<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tank extends Model
{
    protected $table = 'tanks';

    protected $fillable = ['ticketImage','midWeek','weekEnd','fromWhere','toWhere','depart','arrive','user_id'];

    public function accounts(): BelongsTo
    {
        return $this->belongsTo(Account::class , 'user_id' , 'id');
    }
}
