<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigImage extends Model
{
    use HasFactory;

    protected $table = 'images_config';

    protected $fillable = [
        'id',
        'cg_name',
        'cg_value',
        'image_shotcut',
        'image_logo',
        'image_fut',
    ];

}
