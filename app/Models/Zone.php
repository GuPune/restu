<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toe;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zone';

    protected $fillable = [
        'id',
        'name',
        'status',


    ];



public function toe() {
    return $this->hasMany(Toe::class);
}


}
