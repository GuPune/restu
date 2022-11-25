<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoreFunction\Datatable;
use App\Models\Toe;
use App\Models\Zone;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ToeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:toe-list|toe-create|toe-edit|toe-delete', ['only' => ['index','store']]);
         $this->middleware('permission:toe-create', ['only' => ['create','store']]);
         $this->middleware('permission:toe-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:toe-close|toe-open', ['only' => ['close','open']]);
         $this->middleware('permission:toe-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //

        $zonetype = Zone::where('status','Y')->get();

        return view('pages.toe.index')->with('zone',$zonetype);
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
        $randomString = Str::random(30);
        $data['qrcode'] = QrCode::generate('Welcome to Makitweb');

        // Store QR code for download
        $output_file = '/public/qrcode/' . time() . '.svg';
        QrCode::generate('http://restu.test/app/order/list/'.$randomString, public_path($output_file) );

        $save = env('APP_URL'). $output_file;

        $addtoe = Toe::create([
            'number_toe' => $request->number_toe,
            'number_sit' => $request->number_sit,
            'zone_id' => $request->zone_id,
            'qr_code' => $randomString,
            'images_qrcode' => $save,
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

        return response()->json($id);
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

        $data = Toe::where('id',$id)->first();
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



        $updatetor = Toe::where('id',$id)->update([
            'number_toe' => $request->number_toe,
            'number_sit' => $request->number_sit,
            'zone_id' => $request->zone_id
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

        $updatetor = Toe::where('id',$id)->update([
            'status' => 'D',
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }

    public function getdatatable(Request $request)
    {

        $datatoe = Datatable::toedata($request);

        return DataTables::of($datatoe)
            ->setRowClass(function ($datatoe) {
                return $datatoe->status ? '' : 'alert-danger';
            })
            ->make(true);

    }


    public function close(Request $request)
    {
$updatemoney = Toe::where('id',$request->id)->update([
    'status' => 'N'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function open(Request $request)
    {
$updatemoney = Toe::where('id',$request->id)->update([
    'status' => 'Y'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }





}
