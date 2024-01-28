<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'amount', 'date', 'payment_method', 'user_id',
    ];

    // Add any relationships or additional methods here...

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
