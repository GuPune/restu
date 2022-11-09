<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi extends Model
{
    use HasFactory;

    protected $table = 'multi';

    protected $fillable = [
        'id',
        'th',
        'ch',
        'en',
    ];
}
