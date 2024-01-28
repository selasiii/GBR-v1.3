<?php

namespace App;

use App\Models\User;
use App\Travels;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $fillable = [
        'licence_number', 'user_id',
    ];

    // Add any relationships or additional methods here...

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travels()
    {
        return $this->hasMany(Travels::class);
    }
}
