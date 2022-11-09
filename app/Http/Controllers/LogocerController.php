<?php

namespace App\Http\Controllers;

use App\Models\SlideImage;
use Illuminate\Http\Request;

class LogocerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SlideImage::where('slide_type','5')->get();
        return view('pages.logo/logocrv.logoslide')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.logo/logocrv.create');
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

        $inse = SlideImage::create([
            'slide_topic' => $request->title_th,
            'slide_type' => 5,
            'slide_detail' => $request->detais,
            'slide_path' => $request->images_slide,
            'status' => 'Y',
            'slide_url' => $request->url,

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

        $data = SlideImage::where('slide_type','5')->where('id',$id)->first();


        return view('pages.logo/logocrv.edit')->with('data',$data);
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

        $updatecontent = SlideImage::where('id',$id)->update([
            'slide_topic' => $request->title_th,
            'slide_detail' => $request->detais,
            'slide_path' => $request->images_slide,
            'status' => $request->status,
            'slide_url' => $request->url,
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

        $delside = SlideImage::where('id',$id)->delete();


        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }
}
