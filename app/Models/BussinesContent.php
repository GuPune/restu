<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinesContent extends Model
{
    use HasFactory;


    protected $table = 'ourbusiness';

    protected $fillable = [
        'id',
        'name',
        'des',
        'url',
        'keywords',
        'status',
        'view'
    ];

}
