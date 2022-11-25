<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeoffoods extends Model
{
    use HasFactory;

    protected $table = 'type_of_food';

    protected $fillable = [
        'id',
        'name',
        'status',
        'images',

    ];
}
