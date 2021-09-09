<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;
    protected $table = 'contact_from';





    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
}
