<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeoffoods;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use App\Models\Productres;
use App\Models\Zone;

class RestuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
$typeres = Typeoffoods::where('status','Y')->get();

$zone = Zone::where('status','Y')->get();


        return view('pages.res.index')->with('type',$typeres)->with('zone',$zone);
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


        $resadd = Productres::create([
            'code' => $request->code,
            'name_list' => $request->name_list,
            'images' => $request->images,
            'zone_id' => $request->zone,
            'type_of_food_id' => $request->type,
            'price_sell' => $request->price_sell,
            'unit_cost' => $request->unit_cost,
            'note' => $request->note,
            'status' => 'Y'
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
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


    public function getdatatable(Request $request)
    {


        $datazone = Datatable::productresdata($request);


        return DataTables::of($datazone)
            ->setRowClass(function ($datazone) {
                return $datazone->status ? '' : 'alert-danger';
            })
            ->make(true);

    }


    public function close(Request $request)
    {
$updatemoney = Productres::where('id',$request->id)->update([
    'status' => 'N'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function open(Request $request)
    {
$updatemoney = Productres::where('id',$request->id)->update([
    'status' => 'Y'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

}
