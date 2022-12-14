<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:rat-list|rat-create|rat-edit|rat-delete', ['only' => ['index','store']]);
          $this->middleware('permission:rat-create', ['only' => ['create','store']]);
          $this->middleware('permission:rat-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:rat-delete', ['only' => ['destroy']]);
     }
    public function index()
    {
        //
       // $rating = Rating::all();


        $rating = DB::select(DB::raw("select C.number_toe,A.rating,B.qr_code,D.bill_number from rating A
        LEFT JOIN generate B ON A.token = B.qr_code
        LEFT JOIN toe C ON C.id = B.toe_id
				LEFT JOIN bill D ON A.token = D.token
        "));

        return view('pages.rating.index')->with('rating',$rating);
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
}
