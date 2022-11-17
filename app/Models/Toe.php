<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Zone;

class Toe extends Model
{
    use HasFactory;

    protected $table = 'toe';

    protected $fillable = [
        'id',
        'number_toe',
        'number_sit',
        'zone_id',
        'status',
        'orderstatus',
    ];


    public function zone()
{
   return $this->belongsTo(Zone::class,'zone_id','id');
}


}
