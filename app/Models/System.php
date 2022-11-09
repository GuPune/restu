<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $table = 'system_menu';

    protected $fillable = [
        'id',
        'name_th',
        'name_en',
        'name_cn',
        'title_th',
        'title_en',
        'title_cn',
        'system_menu',
        'link',
        'system_encodeid',
        'type',
    ];
}


