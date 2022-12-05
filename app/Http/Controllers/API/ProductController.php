<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Generate;
use App\Models\Order;
use App\Models\Productres;
use App\Models\Toe;
use App\Models\Typeoffoods;
use Illuminate\Http\Request;
use App\CoreFunction\Line;
use App\Models\Call;
use App\Models\Rating;
use DB;

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




$cart = $request->all();

$max_id = Order::max('id')+1;
$cart_number = "ORDER".date('dmY').str_pad($max_id, 6, "0", STR_PAD_LEFT);
foreach ($cart as $index => $check) {
    $checkout = Order::create([
    "res_id" => $check['id'],
    "status" => 'Y',
    "order_number" => $cart_number,
    "orders_price" => $check['price_sell'],
    "total_price" => $check['total_res'],
    "quantity" => $check['qty'],
]);

        }



        return response()->json($cart_number);

    }

    public function ordernumber(Request $request)
    {

$toe = Toe::where('qr_code',$request->token)->first();

            $order = Order::where('order_number',$request->order_number)->get();
            foreach ($order as $key => $orders) {
                $updatetor = Order::where('id',$orders->id)->update([
                    "status" => 'Y',
                    "toe_id" => $toe->id,
                ]);



    }

    return response()->json('success');

    }

    public function order(Request $request)
    {

        $datas =[];
     $getorder = Generate::where('qr_code',$request->token)->first();
        if($getorder){
            $res = Order::where('toe_id',$getorder->toe_id)->get();

            foreach ($res as $index => $re) {
                $product = Productres::where('id',$re->res_id)->first();
                $datas[$index]['name_list'] = $product->name_list;
                $datas[$index]['images'] = $product->images;
                $datas[$index]['total_price'] = $re->total_price;
                $datas[$index]['quantity'] = $re->quantity;
                $datas[$index]['status'] = $re->status;

                    }
        }


    return response()->json($datas);

    }



    public function call(Request $request)
    {




$generatepackage = \App\CoreFunction\Line::Linenotify($request->all());






  $datas = [];
    return response()->json($datas);

    }


    public function ordercheckbill(Request $request)
    {

    $getorder = Generate::where('qr_code',$request->token) ->whereIn('status', ['Y', 'O'])->first();
    $datas = [];
    $datas['status'] = $getorder->status;
    $totalCost = 0;
        if($getorder){
    $ord = Order::select(\DB::raw('product_res.name_list, SUM(fact_order.total_price) as total,SUM(fact_order.quantity) as qty'))
         ->leftJoin('product_res', 'product_res.id', '=', 'fact_order.res_id')
         ->where('fact_order.toe_id',$getorder->toe_id)
         ->groupBy('fact_order.res_id')
         ->get();

                 foreach ($ord as $index => $ords) {
                $datas['data'][$index]['name_list'] = $ords->name_list;
                $datas['data'][$index]['qty'] = $ords->qty;
                $datas['data'][$index]['total'] = $ords->total;


                $totalCost += $ords->total;
                    }

        }
        $datas['total'] = $totalCost;



    return response()->json($datas);

    }
    public function checkbill(Request $request)
    {

        $updatetor = Generate::where('qr_code',$request->token)->update([
            "status" => 'O',
        ]);
        $saverat = Rating::create([
            "token" => $request->token,
            "rating" => $request->stars,
        ]);

    }

    public function orderscus(Request $request)
    {


        $datas = [];
        $getorder = Order::whereIn('status', ['Y', 'O','I'])->get();


        foreach ($getorder as $index => $ords) {
            $res = Productres::where('id',$ords->res_id)->first();
            $toe = Toe::where('id',$ords->toe_id)->first();



           if($ords->status == 'Y'){
            $datas['pending'][$index]['id'] = $ords->id;
            $datas['pending'][$index]['name_list'] = $res->name_list;
            $datas['pending'][$index]['images'] = $res->images;
            $datas['pending'][$index]['toe_id'] = $toe->number_toe;
            $datas['pending'][$index]['qty'] = $ords->quantity;
            $datas['pending'][$index]['status'] = $ords->status;

           }else if($ords->status == 'O'){
            $datas['doing'][$index]['id'] = $ords->id;
            $datas['doing'][$index]['name_list'] = $res->name_list;
            $datas['doing'][$index]['images'] = $res->images;
            $datas['doing'][$index]['toe_id'] = $toe->number_toe;
            $datas['doing'][$index]['qty'] = $ords->quantity;
            $datas['doing'][$index]['status'] = $ords->status;
           }else {
            $datas['waiting'][$index]['id'] = $ords->id;
            $datas['waiting'][$index]['name_list'] = $res->name_list;
            $datas['waiting'][$index]['images'] = $res->images;
            $datas['waiting'][$index]['toe_id'] = $toe->number_toe;
            $datas['waiting'][$index]['qty'] = $ords->quantity;
            $datas['waiting'][$index]['status'] = $ords->status;

           }
                }
        return response()->json($datas);
    }

}
