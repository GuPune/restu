<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toe extends Model
{
    use HasFactory;

    protected $table = 'toe';

    protected $fillable = [
        'id',
        'number_toe',
        'number_sit',
        'status',

    ];
}
