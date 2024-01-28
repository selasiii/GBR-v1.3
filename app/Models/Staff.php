<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'user_id',
    ];

    // Add any relationships or additional methods here...

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
