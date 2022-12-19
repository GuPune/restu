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
use App\Models\Bill;
use App\Models\Call;
use App\Models\Rating;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DB;
use Generator;

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


$toeid = Toe::where('id',$request->toe_id)->first();
$token = Generate::where('qr_code',$toeid->qr_code)->first();

$checkorder = Order::where('status','Y')->where('toe_id',$request->toe_id)->where('res_id',$request->id)->where('ger_id',$token->id)->first();

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
        "ger_id" => $token->id
    ]);

    return response()->json([
        'data' => 'success',
        'datas' => $addorder->id,
    ]);

}


    }


    public function transaction_orders(Request $request)
    {

            $toe = Toe::where('id',$request->toe_id)->first();

         $datas = [];
         $datas['status'] = "NoSelect";
         $datas['data'] = [];
         $order = [];

         if($request->toe_id){

            $toe = Toe::where('id',$request->toe_id)->first();

            $datas['status'] = $toe->orderstatus;
            $getgen = Generate::where('qr_code',$toe->qr_code)->first();

            $getgenid = null;
            if($getgen){
                $getgenid = $getgen->id;
            }
            $order = Order::where('toe_id',$request->toe_id)->where('ger_id',$getgenid)->get();

         }

                foreach ($order as $index => $orders) {
                    $getproduct = Productres::where('id',$orders->res_id)->first();
                        $datas['data'][$index]['code'] = $getproduct->code;
                        $datas['data'][$index]['name_list'] = $getproduct->name_list;
                        $datas['data'][$index]['images'] = $getproduct->images;
                        $datas['data'][$index]['zone_id'] = $getproduct->zone_id;
                        $datas['data'][$index]['type_of_food_id'] = $getproduct->type_of_food_id;
                        $datas['data'][$index]['price_sell'] = $getproduct->price_sell;
                        $datas['data'][$index]['unit_cost'] = $getproduct->unit_cost;
                        $datas['data'][$index]['status'] = $getproduct->status;
                        $datas['data'][$index]['id'] = $getproduct->id;
                        $datas['data'][$index]['order_id'] = $orders->id;
                        $datas['data'][$index]['res_id'] = $orders->res_id;
                        $datas['data'][$index]['toe_id'] = $orders->toe_id;
                        $datas['data'][$index]['quantity'] = $orders->quantity;
                        $datas['data'][$index]['orders_price'] = $orders->orders_price;
                        $datas['data'][$index]['totalPrice'] = $orders->total_price;
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

$cart = $request->all();

$max_id = Order::max('id')+1;
$cart_number = "ORDER".date('dmY').str_pad($max_id, 6, "0", STR_PAD_LEFT);
foreach ($cart as $index => $check) {
    $checkout = Order::create([
    "res_id" => $check['id'],
    "note" => $check['note'],
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
$gen = Generate::where('qr_code',$request->token)->first();

            $order = Order::where('order_number',$request->order_number)->get();
            foreach ($order as $key => $orders) {
                $updatetor = Order::where('id',$orders->id)->update([
                    "status" => 'Y',
                    "toe_id" => $toe->id,
                    "ger_id" => $gen->id
                ]);



    }

    return response()->json('success');

    }

    public function order(Request $request)
    {

        $datas =[];
     $getorder = Generate::where('qr_code',$request->token)->first();
        if($getorder){
            $res = Order::where('toe_id',$getorder->toe_id)->where('ger_id',$getorder->id)->get();

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

    $getorder = Generate::where('qr_code',$request->token)->whereIn('status', ['Y', 'O'])->first();
    $datas = [];
    $datas['status'] = $getorder->status;
    $totalCost = 0;
        if($getorder){
    $ord = Order::select(\DB::raw('product_res.name_list, SUM(fact_order.total_price) as total,SUM(fact_order.quantity) as qty'))
         ->leftJoin('product_res', 'product_res.id', '=', 'fact_order.res_id')
         ->where('fact_order.toe_id',$getorder->toe_id)
         ->where('fact_order.ger_id',$getorder->id)
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
        $datas['pending'] = [];
        $datas['doing'] = [];
        $datas['waiting'] = [];
        $orderPending  = Order::where('status', 'Y')->get();
        $orderDoing  =  Order::where('status', 'O')->get();
        $orderWait =  Order::where('status', 'I')->get();


        if($orderPending){
            foreach ($orderPending as $key => $ords) {
                $res = Productres::where('id',$ords->res_id)->first();
                $toe = Toe::where('id',$ords->toe_id)->first();
                $datas['pending'][$key]['id'] = $ords->id;
                $datas['pending'][$key]['name_list'] = $res->name_list;
                $datas['pending'][$key]['images'] = $res->images;
                $datas['pending'][$key]['toe_id'] = $toe->number_toe;
                $datas['pending'][$key]['qty'] = $ords->quantity;
                $datas['pending'][$key]['status'] = $ords->status;
                $datas['pending'][$key]['note'] = $ords->note;
            }
        }

        if($orderDoing){
            foreach ($orderDoing as $key => $ordsdo) {
                $res = Productres::where('id',$ordsdo->res_id)->first();
                $toe = Toe::where('id',$ordsdo->toe_id)->first();
                $datas['doing'][$key]['id'] = $ordsdo->id;
                $datas['doing'][$key]['name_list'] = $res->name_list;
                $datas['doing'][$key]['images'] = $res->images;
                $datas['doing'][$key]['toe_id'] = $toe->number_toe;
                $datas['doing'][$key]['qty'] = $ordsdo->quantity;
                $datas['doing'][$key]['status'] = $ordsdo->status;
                $datas['doing'][$key]['note'] = $ordsdo->note;
            }
        }

        if($orderWait){
            foreach ($orderWait as $key => $ordswait) {
                $res = Productres::where('id',$ordswait->res_id)->first();
                $toe = Toe::where('id',$ordswait->toe_id)->first();
                $datas['waiting'][$key]['id'] = $ordswait->id;
                $datas['waiting'][$key]['name_list'] = $res->name_list;
                $datas['waiting'][$key]['images'] = $res->images;
                $datas['waiting'][$key]['toe_id'] = $toe->number_toe;
                $datas['waiting'][$key]['qty'] = $ordswait->quantity;
                $datas['waiting'][$key]['status'] = $ordswait->status;
                $datas['waiting'][$key]['note'] = $ordswait->note;
            }
        }
        // foreach ($getorder as $index => $ords) {
        //     $res = Productres::where('id',$ords->res_id)->first();
        //     $toe = Toe::where('id',$ords->toe_id)->first();



        //    if($ords->status == 'Y'){

        //     $datas['pending'][$index]['id'] = $ords->id;
        //     $datas['pending'][$index]['name_list'] = $res->name_list;
        //     $datas['pending'][$index]['images'] = $res->images;
        //     $datas['pending'][$index]['toe_id'] = $toe->number_toe;
        //     $datas['pending'][$index]['qty'] = $ords->quantity;
        //     $datas['pending'][$index]['status'] = $ords->status;

        //    }else if($ords->status == 'O'){

        //     $datas['doing'][$index]['id'] = $ords->id;
        //     $datas['doing'][$index]['name_list'] = $res->name_list;
        //     $datas['doing'][$index]['images'] = $res->images;
        //     $datas['doing'][$index]['toe_id'] = $toe->number_toe;
        //     $datas['doing'][$index]['qty'] = $ords->quantity;
        //     $datas['doing'][$index]['status'] = $ords->status;

        //    }else {

        //     $datas['waiting'][$index]['id'] = $ords->id;
        //     $datas['waiting'][$index]['name_list'] = $res->name_list;
        //     $datas['waiting'][$index]['images'] = $res->images;
        //     $datas['waiting'][$index]['toe_id'] = $toe->number_toe;
        //     $datas['waiting'][$index]['qty'] = $ords->quantity;
        //     $datas['waiting'][$index]['status'] = $ords->status;

        //    }
        //         }

        return response()->json($datas);
    }

    public function updateorder_pen(Request $request)
    {

if($request->all()){
    foreach ($request->all() as $index => $orders) {
        $updatetor = Order::where('id',$orders)->update([
            "status" => 'O'
        ]);
    }
}



        return response()->json('success');
    }

    public function updateorder_wait(Request $request)
    {
        if($request->all()){
            foreach ($request->all() as $index => $orders) {
                $updatetor = Order::where('id',$orders)->update([
                    "status" => 'S'
                ]);
            }
        }
        return response()->json('success');
    }

    public function updateorder_doing(Request $request)
    {
        if($request->all()){
            foreach ($request->all() as $index => $orders) {
                $updatetor = Order::where('id',$orders)->update([
                    "status" => 'I'
                ]);
            }
        }
        return response()->json('success');
    }

    public function opentoe(Request $request)
    {






        ///// generate token
        $randomString = Str::random(30);


        $gento = Generate::create([
            "qr_code" => $randomString,
            "toe_id" => $request->toe_id,
            "status" => 'Y'
        ]);


        $output_file = '/public/qrcode/' . time() . '.svg';
        QrCode::generate('https://restu.idtest.work/app/order/list/'.$randomString, public_path($output_file) );

        $save = env('APP_URL'). $output_file;


        $updatetor = Toe::where('id',$request->toe_id)->update([
            "qr_code" => $randomString,
            "images_qrcode" => $save,
            "orderstatus" => 'notidle',
        ]);




        return response()->json('success');
    }

    public function canceltoe(Request $request)
    {



        $gettoe = Toe::where('id',$request->toe_id)->first();
        \Log::info($gettoe);





$updategen = Generate::where('qr_code',$gettoe->qr_code)->update([
    "status" => "C",
]);

$updatetor = Toe::where('id',$request->toe_id)->update([
    "qr_code" => Null,
    "images_qrcode" => Null,
    "orderstatus" => 'idle',
]);




        return response()->json('success');
    }




    public function checktoken(Request $request)
    {



        $datas = [];
        $datas['status'] = 'N';
        $get = Generate::where('qr_code',$request->token)->where('status','Y')->first();

        // $updatetor = Order::where('order_number',$orders->id)->update([
        //     "status" => 'Y',
        //     "toe_id" => $toe->id,
        // ]);
        if($get){
            $datas['status'] = $get->status;
        }
        return response()->json($datas['status']);

    }

    public function qrcode(Request $request)
    {


$gettoe = Toe::where('id',$request->toe_id)->first();
$datas = [];
$datas['number_toe'] = $gettoe->number_toe;
$datas['images_qrcode'] = $gettoe->images_qrcode;
$datas['number_sit'] =  $gettoe->number_sit;

\Log::info($datas);

return response()->json($datas);


    }

    public function clearbill(Request $request)
    {


$datas = [];

$gettoken = Generate::where('toe_id',$request->toe_id)->where('status','Y')->first();
$toe = Toe::where('id',$request->toe_id)->first();

$max_id = Bill::max('id')+1;
$billnumber = "BILL".date('dmY').str_pad($max_id, 6, "0", STR_PAD_LEFT);

$dis = $request->pricetotal - $request->pricediscount;
$bill = Bill::create([
    "token" => $toe->qr_code,
    "bill_number" => $billnumber,
    "pricetotal" => $request->pricetotal,
    "pricediscount" => $dis,
]);

$updatetor = Toe::where('id',$request->toe_id)->update([
    "qr_code" => Null,
    "images_qrcode" => Null,
    "orderstatus" => 'idle',
]);

$uptoken = Generate::where('qr_code',$gettoken->qr_code)->update([
    "status" => 'S',
]);

$uptoken = Order::where('toe_id',$request->toe_id)->where('status','Y')->update([
    "bill_id" => $bill->id,
    "status" => 'S',
]);


return response()->json($datas);
    }

}
