<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'date',
        'location',
        'status',
        'tickets_total',
        'price'
    ];

    public function organizer() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
