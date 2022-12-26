<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use App;
use App\Models\Bill;
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


        $data =  Toe::select('toe.id','toe.number_toe','toe.number_sit','toe.zone_id','toe.qr_code','zone.name','toe.status','toe.images_qrcode')
        ->leftJoin('zone', 'toe.zone_id', '=', 'zone.id')->where('zone.status','Y')
        ->whereIn('toe.status',['Y','N'])->get();

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




        $data =  Productres::select('product_res.id','product_res.code','product_res.name_list','product_res.images','product_res.price_sell','product_res.status','type_of_food.name')
        ->leftJoin('type_of_food', 'product_res.type_of_food_id', '=', 'type_of_food.id')
        ->whereIn('product_res.status',['Y','N']);

        if($request->serachname_list){
            $data->where('product_res.name_list',$request->serachname_list);
       }
       if($request->serachcode){
           $data->where('product_res.code',$request->serachcode);
       }
       if($request->searchtype){
        $data->where('product_res.type_of_food_id',$request->searchtype);
       }
       $data->get();



   return $data;
    }


    public static function saleorder($request = null)
    {

        $data =  Bill::select('bill.id','bill.bill_number','bill.pricetotal','bill.pricediscount','bill.type_pay','bill.get_paid','bill.accept_change','bill.qty','bill.discount_all_order','bill.total','generate.status','bill.created_at',DB::raw("DATE_FORMAT(bill.created_at, '%d-%b-%Y %H:%i:%s') as day_fort"))
        ->leftJoin('generate', 'bill.token', '=', 'generate.qr_code');

        if($request['typepay']){
            $data->where('bill.type_pay',$request['typepay']);
        }
        if($request['status']){
           $data->where('generate.status',$request['status']);
        }
        if($request['billnumber']){
            $data->where('bill.bill_number',$request['billnumber']);
        }

        $data->orderBy('bill.created_at', 'desc')->get();

        // 'inputdaterange' => '12/26/2022 - 12/26/2022',

        return $data;

    }







}
