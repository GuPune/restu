<?php

namespace App\Http\Controllers;

use App\Models\SystemRes;
use Illuminate\Http\Request;

class SettingController extends Controller
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
$syste = SystemRes::first();

        return view('pages.setting.index')->with('system',$syste);
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

        \Log::info($request->all());

        $upsys = SystemRes::find($id)->update([
            'order_set' => $request->selectedOption,
            'line_notify' => $request->line_notify
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
    }
}
