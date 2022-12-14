<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\CoreFunction\Datatable;
use App\Models\Toe;
use Yajra\DataTables\DataTables;


class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:zone-list|zone-create|zone-edit|zone-delete', ['only' => ['index','store']]);
         $this->middleware('permission:zone-create', ['only' => ['create','store']]);
         $this->middleware('permission:zone-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:zone-close|zone-open', ['only' => ['close','open']]);
         $this->middleware('permission:zone-delete', ['only' => ['destroy']]);

    }





    public function index()
    {
        //

        return view('pages.zone.index');
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

        $addzone = Zone::create([
            'name' => $request->name,
            'status' => 'Y'
        ]);

        return response()->json([
            'msg_return' => 'สำเร็จ',
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

        $data = Zone::where('id',$id)->first();
        return response()->json($data);
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

        $updatezoner = Zone::where('id',$id)->update([
            'name' => $request->name,
        ]);



        return response()->json([
            'msg_return' => 'สำเร็จ',
            'code_return' => 1,
        ]);
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

        $updatezone = Zone::where('id',$id)->update([
            'status' => 'D',
        ]);

        $updatetor = Toe::where('zone_id',$id)->update([
            'status' => 'D',
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }


    public function getdatatable(Request $request)
    {


        $datazone = Datatable::zonedata($request);


        return DataTables::of($datazone)
            ->setRowClass(function ($datazone) {
                return $datazone->status ? '' : 'alert-danger';
            })
            ->make(true);

    }


    public function close(Request $request)
    {
$updatemoney = Zone::where('id',$request->id)->update([
    'status' => 'N'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function open(Request $request)
    {
$updatemoney = Zone::where('id',$request->id)->update([
    'status' => 'Y'
]);


        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

}
