<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    protected $table = 'language';

    protected $fillable = [
        'id',
        'ca_id',
        'name',
    ];
}

