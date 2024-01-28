<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $fillable = [
        'route_name', 'start_terminal_id', 'end_terminal_id',
    ];

    // Add any relationships or additional methods here...

    
    public function travels()
    {
        return $this->hasMany(Travels::class);
    }
}
