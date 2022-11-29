<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Productres;
use App\Models\Toe;
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

    public function gettoe(Request $request)
    {
        $data = Toe::where('status','Y')->get();
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


$checkorder = Order::where('status','Y')->where('toe_id',$request->toe_id)->where('res_id',$request->id)->first();

if($checkorder){
    $totalprice = ($checkorder->quantity + 1) * ($checkorder->orders_price);

    $updatetor = Order::where('res_id',$request->id)->where('status','Y')->where('toe_id',$request->toe_id)->update([
        "res_id" => $request->id,
        "toe_id" => $request->toe_id,
        "status" => 'Y',
        "total_price" => $totalprice,
        "quantity" => $checkorder->quantity + 1,
    ]);

    return response()->json([
        'data' => 'success',
        'datas' => $checkorder->id,
    ]);


}else {
    $addorder = Order::create([
        "res_id" => $request->id,
        "toe_id" => $request->toe_id,
        "quantity" => 1,
        "orders_price" => $request->price_sell,
        "total_price" => $request->price_sell,
        "status" => 'Y',
    ]);

    return response()->json([
        'data' => 'success',
        'datas' => $addorder->id,
    ]);

}


    }


    public function transaction_orders(Request $request)
    {


         $order = Order::where('toe_id',$request->toe_id)->where('status','Y')->get();
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
                        $datas[$index]['id'] = $getproduct->id;
                        $datas[$index]['order_id'] = $orders->id;
                        $datas[$index]['res_id'] = $orders->res_id;
                        $datas[$index]['toe_id'] = $orders->toe_id;
                        $datas[$index]['quantity'] = $orders->quantity;
                        $datas[$index]['orders_price'] = $orders->orders_price;
                        $datas[$index]['totalPrice'] = $orders->total_price;
                }

       return response()->json($datas);
    }

    public function transaction_ordersupdate(Request $request)
    {


        $datas = [];
$getres = Order::where('id',$request->order_id)->first();

     $getproduct = Productres::where('id',$getres->res_id)->first();
    $total = $getproduct->price_sell * $request->quantity;


$updatedata = Order::where('id',$request->order_id)->update([
    'quantity'=> $request->quantity,
    'total_price'=> $total,
]);

       return response()->json($datas);
    }

    public function transaction_ordersdelete(Request $request)
    {

      $delorder = Order::where('id',$request->order_id)->where('toe_id',$request->toe_id)->delete();
        return response()->json('delete');
    }

    public function fronttyperes(Request $request)
    {


        $datas = [];

        $typefood = Typeoffoods::where('status','Y')->get();

        foreach ($typefood as $index => $typefoods) {
            $datas[$index]['id'] = $typefoods->id;
            $datas[$index]['name'] = $typefoods->name;
            $datas[$index]['status'] = $typefoods->status;
            $datas[$index]['images'] = $typefoods->images;
            $datas[$index]['token'] = $request->token;
                }

        return response()->json($datas);

    }

    public function frontres(Request $request)
    {
        $getres = Productres::where('type_of_food_id',$request->typeres)->where('status','Y')->get();
        return response()->json($getres);
    }

    public function restoe(Request $request)
    {

        $gettoe = Toe::where('qr_code',$request->token)->where('status','Y')->first();

        return response()->json($gettoe);

    }

    public function checkout(Request $request)
    {

\Log::info($request->all());
        return response()->json($request->all());

    }



}
