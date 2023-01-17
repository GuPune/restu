<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeoffoods;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;

class TypeResController extends Controller
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
        return view('pages.typeres.index');
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

        $image = $request->images;

        if(!$request->images){
$image = 'no_photo.jpg';
        }

        $addrestype = Typeoffoods::create([
            'name' => $request->name,
            'images' => $image,
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

        $data = Typeoffoods::where('id',$id)->first();
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


        $updatetype = Typeoffoods::where('id',$id)->update([
            'name' => $request->name,
            'images' => $request->images,
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

        $updatetor = Typeoffoods::where('id',$id)->update([
            'status' => 'D',
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }


    public function getdatatable(Request $request)
    {


        $datazone = Datatable::typeresdata($request);


        return DataTables::of($datazone)
            ->setRowClass(function ($datazone) {
                return $datazone->status ? '' : 'alert-danger';
            })
            ->make(true);

    }


    public function close(Request $request)
    {
$updatemoney = Typeoffoods::where('id',$request->id)->update([
    'status' => 'N'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function open(Request $request)
    {
$updatemoney = Typeoffoods::where('id',$request->id)->update([
    'status' => 'Y'
]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }
}
