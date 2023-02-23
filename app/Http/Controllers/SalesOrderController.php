<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoreFunction\Datatable;
use App\Models\Bank;
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

     function __construct()
     {
          $this->middleware('permission:salesorder-list|salesorder-create|salesorder-edit|salesorder-delete', ['only' => ['index','store']]);
          $this->middleware('permission:salesorder-create', ['only' => ['create','store']]);
          $this->middleware('permission:salesorder-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:salesorder-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        //

        $pay = Bank::where('type','Y')->get();

        return view('pages.salesorder.index')->with('bank',$pay);
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
