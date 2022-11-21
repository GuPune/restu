<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Productres;
use App\Models\Typeoffoods;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //

    public function index()
    {

        $data = Productres::where('status','Y')->get();


        return response()->json($data);

    }
    public function typeres()
    {

        $data = Typeoffoods::where('status','Y')->get();
        return response()->json($data);
    }

    public function fitter(Request $request)
    {

        if($request->id == 0){
            $data = Productres::where('status','Y')->get();
        }elseif($request->id != 0){
            $data = Productres::where('status','Y')->where('type_of_food_id',$request->id)->get();
        }

        return response()->json($data);

    }

    public function orderssave(Request $request)
    {






$checkorder = Order::where('status','Y')->where('toe_id',1)->where('res_id',$request->id)->first();


if($checkorder){

    $updatetor = Order::where('res_id',$request->id)->where('status','Y')->where('toe_id',1)->update([
        "res_id" => $request->id,
        "toe_id" => 1,
        "status" => 'Y',
        "quantity" => $checkorder->quantity + 1,
    ]);


}else {
    $addorder = Order::create([
        "res_id" => $request->id,
        "toe_id" => 1,
        "quantity" => 1,
        "orders_price" => $request->price_sell,
        "total_price" => $request->price_sell,
        "status" => 'Y',
    ]);

}
return response()->json('success');

    }


    public function transaction_orders(Request $request)
    {
        \Log::info($request->all());

       // $order = Order::where()
$datas = [];



       return response()->json($datas);
    }

}
