<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'price',
        'status',
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
    public function attendee() {
        return $this->belongsTo(User::class, 'user_id');
    }

   
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
