<?php

namespace App\Http\Controllers;

use App\Models\Toe;
use App\Models\Zone;
use Illuminate\Http\Request;


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
        $data = Zone::where('status','Y')->get();

        $datas = [];

        foreach ($data as $key => $datay) {
            $toe = Toe::where('zone_id',$datay['id'])->get();
            $datas['data'][$key]['zone'] = $datay['name'];
            $datas['data'][$key]['toe'] = $toe;
        }

        return response()->json($datas);
    }
}
