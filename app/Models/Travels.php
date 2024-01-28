<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travels extends Model
{
    protected $fillable = [
        'route_name', 'driver_id', 'bus_id', 'departure_datetime', 'arrival_datetime', 'travel_status', 'route_id', 'estimated_time_of_arrival',
    ];

    // Add any relationships or additional methods here...

    
    public function route()
    {
        return $this->belongsTo(Routes::class, 'route_id');
    }

    public function driver()
    {
        return $this->belongsTo(Drivers::class, 'driver_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
