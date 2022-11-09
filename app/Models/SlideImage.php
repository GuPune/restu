<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    use HasFactory;


    protected $table = 'images_web';

    protected $fillable = [
        'id',
        'slide_topic',
        'slide_type',
        'slide_detail',
        'slide_path',
        'status',
        'slide_url',
        'slide_crt',
        'lang'
    ];
}
