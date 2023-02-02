<?php

namespace App\Http\Controllers;

use App\Models\Generate;
use Illuminate\Http\Request;

class ListresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$token)
    {
        //




$checktoken = Generate::where('qr_code',$token)->first();

if($checktoken){

    if($checktoken->status == 'Y'){

return view("welcome");
    }elseif($checktoken->status == 'S'){
        return view("thank");
    }else{
        abort(404);
    }

}else{
    abort(404);
}



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


    public function view(Request $request,$token)
    {
        //




$checktoken = Generate::where('qr_code',$token)->first();

if($checktoken){

    if($checktoken->status == 'Y'){

return view("welcome");
    }elseif($checktoken->status == 'S'){
        return view("thank");
    }else{
        abort(404);
    }

}else{
    abort(404);
}



    }
}
