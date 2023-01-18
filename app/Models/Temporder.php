<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporder extends Model
{
    use HasFactory;

    protected $table = 'temp';

    protected $fillable = [
        'id',
        'fact_order_id',
        'res_id',
    ];
}
