<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminals extends Model
{
    protected $fillable = [
        'terminal_name', 'location', 'region', 'staff_id',
    ];

    // Add any relationships or additional methods here...

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
