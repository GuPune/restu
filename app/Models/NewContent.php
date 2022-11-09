<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewContent extends Model
{
    use HasFactory;

    protected $table = 'new';

    protected $fillable = [
        'id',
        'title_th',
        'title_en',
        'title_ch',
        'detail_th',
        'detail_en',
        'detail_ch',
        'url',
        'keywords',
        'status',
        'n_code',
        'type',
        'name_th',
        'name_en',
        'name_ch',
        'view'
    ];
}
