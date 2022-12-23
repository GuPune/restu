<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Productres;
use App\Models\SystemRes;
use App\Models\Toe;
use App\Models\Zone;
use Illuminate\Http\Request;
use DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','store']]);
          $this->middleware('permission:order-create', ['only' => ['create','store']]);
          $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:order-delete', ['only' => ['destroy']]);
     }
    public function index()
    {
        //


        $indentity = Zone::with('toe')->where('status','Y')->get();


        return view("pages.order.index")->with('item',$indentity);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test()
    {
        //
        // $data = Zone::where('status','Y')->get();

        // $datas = [];

        // foreach ($data as $key => $datay) {
        //     $toe = Toe::where('zone_id',$datay['id'])->get();
        //     $datas['data'][$key]['zone'] = $datay['name'];
        //     $datas['data'][$key]['toe'] = $toe;
        // }


      //  $getorder = Order::whereIn('status', ['Y', 'O','I'])->get();

      //  $getorder = Order::with('Prodes')->get();

      $fgetday = SystemRes::first();

      if($fgetday->order_set == 'C'){

        $datas = [];
        $datas['pending'] = [];
        $datas['doing'] = [];
        $datas['waiting'] = [];


        $orderPending =  Order::select('fact_order.id','fact_order.res_id','fact_order.toe_id','fact_order.bill_id','fact_order.quantity','fact_order.total_price','fact_order.orders_price','fact_order.status','fact_order.note','product_res.res_kit','product_res.res_kit')
        ->leftJoin('product_res', 'fact_order.res_id', '=', 'product_res.id')->where('product_res.res_kit','S')->where('fact_order.status','Y')->get();

        $orderDoing =  Order::select('fact_order.id','fact_order.res_id','fact_order.toe_id','fact_order.bill_id','fact_order.quantity','fact_order.total_price','fact_order.orders_price','fact_order.status','fact_order.note','product_res.res_kit','product_res.res_kit')
        ->leftJoin('product_res', 'fact_order.res_id', '=', 'product_res.id')->where('product_res.res_kit','S')->where('fact_order.status','O')->get();

        $orderWait =  Order::select('fact_order.id','fact_order.res_id','fact_order.toe_id','fact_order.bill_id','fact_order.quantity','fact_order.total_price','fact_order.orders_price','fact_order.status','fact_order.note','product_res.res_kit','product_res.res_kit')
        ->leftJoin('product_res', 'fact_order.res_id', '=', 'product_res.id')->where('product_res.res_kit','S')->where('fact_order.status','I')->get();


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




      }
      if($fgetday->order_set == 'S'){
        $datas = [];
        $datas['pending'] = [];
        $datas['doing'] = [];
        $datas['waiting'] = [];

        // $orderPending =  Order::select('fact_order.id','fact_order.res_id','fact_order.toe_id','fact_order.bill_id','fact_order.quantity','fact_order.total_price','fact_order.orders_price','fact_order.status','fact_order.note','product_res.res_kit','product_res.res_kit','fact_order.created_at')
        // ->leftJoin('product_res', 'fact_order.res_id', '=', 'product_res.id')->where('product_res.res_kit','S')->where('fact_order.status','Y')->get();




        //  $users = DB::table('fact_order')
        //  ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY id DESC) AS Row'))->get();


         $orderPending = DB::select(
            DB::raw("select ROW_NUMBER() OVER (ORDER BY B.name_list) AS rowbumber,A.id as id,B.name_list As name_list,A.quantity As quantity,A.created_at As created_at,B.images As images,A.note as note,A.toe_id as toe_id,A.status as status,A.res_id as res_id
            from fact_order A
           left join product_res B ON A.res_id = B.id where B.res_kit = 'S' AND A.`status` = 'Y'
           ")
         );

         $orderDoing = DB::select(
            DB::raw("select ROW_NUMBER() OVER (ORDER BY B.name_list) AS rowbumber,A.id as id,B.name_list As name_list,A.quantity As quantity,A.created_at As created_at,B.images As images,A.note as note,A.toe_id as toe_id,A.status as status,A.res_id as res_id
            from fact_order A
           left join product_res B ON A.res_id = B.id where B.res_kit = 'S' AND A.`status` = 'O'
           ")
         );
         $orderWait = DB::select(
            DB::raw("select ROW_NUMBER() OVER (ORDER BY B.name_list) AS rowbumber,A.id as id,B.name_list As name_list,A.quantity As quantity,A.created_at As created_at,B.images As images,A.note as note,A.toe_id as toe_id,A.status as status,A.res_id as res_id
            from fact_order A
           left join product_res B ON A.res_id = B.id where B.res_kit = 'S' AND A.`status` = 'I'
           ")
         );

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
                $datas['pending'][$key]['created_at'] = $ords->created_at;
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
      }









        return response()->json($datas);
    }
}
