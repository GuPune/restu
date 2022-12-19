<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'fact_order';

    protected $fillable = [
        'id',
        'res_id',
        'toe_id',
        'bill_id',
        'status',
        'orders_price',
        'total_price',
        'order_number',
        'quantity',
        'note',
        'ger_id'
    ];
}
