<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoreFunction\Datatable;
use App\Models\Bill;
use App\Models\Generate;
use App\Models\Order;
use Yajra\DataTables\DataTables;


class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //


        return view('pages.salesorder.index');
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

        $findbill = Bill::where('id',$id)->first();
        $findger = Generate::where('qr_code',$findbill->token)->first();


        $data =  Order::select('fact_order.id','fact_order.res_id','fact_order.orders_price','fact_order.total_price','fact_order.quantity','fact_order.discount','product_res.name_list','product_res.images','product_res.price_sell')
        ->leftJoin('product_res', 'fact_order.res_id', '=', 'product_res.id')->where('fact_order.ger_id',$findger->id)->get();

      return view('pages.salesorder.show')->with('bill',$findbill)->with('order',$data);
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

    public function getdatatable(Request $request)
    {


        $sale = Datatable::saleorder($request);


        return DataTables::of($sale)
            ->setRowClass(function ($sale) {
                return $sale->status ? '' : 'alert-danger';
            })
            ->make(true);

    }

}
