<?php

namespace App;

use App\Models\User;
use App\Passengers;
use App\Travels;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'issued_date', 'expiry_date', 'price', 'status', 'user_id', 'travel_id',
    ];

    // Add any relationships or additional methods here...

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travels::class, 'travel_id');
    }

    public function passengers()
    {
        return $this->hasMany(Passengers::class);
    }
}
