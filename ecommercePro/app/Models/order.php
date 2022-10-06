<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    use Notifiable;

    protected $fillable = [

        'name',
        'email',
        'phone',
        'address',
        'product_title',
        'product_quantity',
        'price',
        'image',
        'product_id',
        'user_id'

    ];
}
