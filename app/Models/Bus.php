<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'bus_number', 'capacity', 'model', 'make', 'year', 'color', 'status', 'bus_state',
    ];

    // Add any relationships or additional methods here...


    public function travels()
    {
        return $this->hasMany(Travels::class);
    }
}
