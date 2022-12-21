<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemRes extends Model
{
    use HasFactory;

    protected $table = 'systemres';

    protected $fillable = [
        'id',
        'line_notify',
        'order_set',
    ];
}
