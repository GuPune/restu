<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productres extends Model
{
    use HasFactory;

    protected $table = 'product_res';

    protected $fillable = [
        'id',
        'code',
        'name_list',
        'images',
        'zone_id',
        'type_of_food_id',
        'price_sell',
        'unit_cost',
        'note',
        'status',
    ];
}
