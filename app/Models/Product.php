<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use PDF;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'prodname',
        'prodpicture',
        'prodprice',
    ];
    public function user()
    {
        // return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);

    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'cart');
    }



}
