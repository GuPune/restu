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
      //  \Log::info($request->all());

         $order = Order::where('toe_id',$request->toe_id)->get();
$datas = [];
                foreach ($order as $index => $orders) {

                    $getproduct = Productres::where('id',$orders->res_id)->first();
                        $datas[$index]['code'] = $getproduct->code;
                        $datas[$index]['name_list'] = $getproduct->name_list;
                        $datas[$index]['images'] = $getproduct->images;
                        $datas[$index]['zone_id'] = $getproduct->zone_id;
                        $datas[$index]['type_of_food_id'] = $getproduct->type_of_food_id;
                        $datas[$index]['price_sell'] = $getproduct->price_sell;
                        $datas[$index]['unit_cost'] = $getproduct->unit_cost;
                        $datas[$index]['status'] = $getproduct->status;
                        $datas[$index]['id'] = $orders->id;
                        $datas[$index]['res_id'] = $orders->res_id;
                        $datas[$index]['toe_id'] = $orders->toe_id;
                        $datas[$index]['quantity'] = $orders->quantity;
                        $datas[$index]['orders_price'] = $orders->orders_price;
                        $datas[$index]['total_price'] = $orders->total_price;
                }



       return response()->json($datas);
    }

}
