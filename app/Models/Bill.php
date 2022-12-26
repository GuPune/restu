<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bill';

    protected $fillable = [
        'id',
        'bill_number',
        'token',
        'pricetotal',
        'pricediscount',
        'discount_all_order',
        'get_paid',
        'accept_change',
        'type_pay',
        'qty',
        'total'
    ];
}
