<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use App;
use DB;
use App\Models\Toe;
use App\Models\Zone;
use App\Models\Typeoffoods;
use Log;
use App\Models\Productres;




class Datatable extends Model
{

    public static function toedata($request = null)
    {

        $data = Toe::whereIn('status', ['Y','N'])->get();

        return $data;

    }

    public static function zonedata($request = null)
    {


        $data = Zone::whereIn('status', ['Y','N'])->get();

        return $data;

    }


    public static function typeresdata($request = null)
    {
        $data = Typeoffoods::whereIn('status', ['Y','N'])->get();

        return $data;

    }

    public static function productresdata($request = null)
    {


        // $data = Productres::whereIn('status', ['Y','N'])->get();

        // return $data;


        $data =  Productres::select('product_res.id','product_res.code','product_res.name_list','product_res.images','product_res.price_sell','product_res.status','type_of_food.name')
        ->leftJoin('type_of_food', 'product_res.type_of_food_id', '=', 'type_of_food.id')
        ->whereIn('product_res.status',['Y','N'])->get();




   return $data;
    }






}
