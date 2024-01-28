<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{
    protected $fillable = [
        'ticket_id', 'travel_id',
    ];

    // Add any relationships or additional methods here...

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id');
    }

    public function travel()
    {
        return $this->belongsTo(Travels::class, 'travel_id');
    }

}
