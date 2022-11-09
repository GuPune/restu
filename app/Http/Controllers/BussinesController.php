<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewContent;
use App\CoreFunction;

class BussinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //


       $data = NewContent::whereIn('status', ['Y', 'N'])->where('type','2')->get();


        return view('pages.bussines.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.bussines.form');
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

       $n_text_th = htmlentities($request->detail_th);
       $n_text_en = htmlentities($request->detail_en);
       $n_text_ch = htmlentities($request->detail_ch);

     $n_code = CoreFunction\Cutstr::random_password(20);


      $save = NewContent::create([
        'title_th' => $request->title_th,
        'title_en' => $request->title_en,
        'title_ch' => $request->title_ch,
        'detail_th' => $n_text_th,
        'detail_en' => $n_text_en,
        'detail_ch' => $n_text_ch,
        'url' => $request->url,
        'keywords' => $request->keyword,
        'n_code' => $n_code,
        'name_ch' => $request->name_ch,
        'name_th' => $request->name_th,
        'name_en' => $request->name_en,
        'view' => 0,
        'type' => 2,
        'status' => 'Y'
    ]);

        return 1;
    }


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
        $data = NewContent::where('id',$id)->where('type',2)->first();

        return view('pages.bussines.formedit')->with('data',$data);
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

        $n_text_th = htmlentities($request->detail_th);
        $n_text_en = htmlentities($request->detail_en);
        $n_text_ch = htmlentities($request->detail_ch);
        $updatecontent = NewContent::where('id',$id)->update([
            'title_th' => $request->title_th,
            'title_en' => $request->title_en,
            'title_ch' => $request->title_ch,
            'detail_th' => $n_text_th,
            'detail_en' => $n_text_en,
            'detail_ch' => $n_text_ch,
            'url' => $request->url,
            'keywords' => $request->keyword,
            'name_ch' => $request->name_ch,
            'name_th' => $request->name_th,
            'name_en' => $request->name_en,
            'status' => $request->status
        ]);
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
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

        $dele = NewContent::where('id',$id)->update(['status' => 'D']);


        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }
}
