<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;



protected $table = "orders" ;



    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }


    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }




}
