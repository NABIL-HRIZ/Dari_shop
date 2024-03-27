<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Order extends Model
{
    use HasFactory;
    use Notifiable;
   
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'user_id',

        'product_title',
        'product_quantity',
        'product_price',
        'product_image',
        'product_id',

        'payment_status',
        'delivery_status',

     ];
}
