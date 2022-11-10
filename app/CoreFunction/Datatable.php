<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use App;
use DB;
use App\Models\Toe;
use App\Models\Zone;
use Log;





class Datatable extends Model
{

    public static function toedata($request = null)
    {

        $data = Toe::whereIn('status', ['Y','N'])->get();

        return $data;

    }

    public static function zonedata($request = null)
    {

        \Log::info('zone');
        $data = Zone::whereIn('status', ['Y','N'])->get();

        return $data;

    }





}
