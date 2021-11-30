<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     // return $this->belongsTo('App\Models\User');
    //     return $this->belongsTo(User::class);

    // }

    public function order()
    {
        // return $this->belongsTo('App\Models\User');
        return $this->belongsTo(Order::class);

    }

}
