<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
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
        $bank = Bank::whereIn('type',['Y','N'])->get();


        return view('pages.bank.index')->with('bank',$bank);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
        ];

        // "name" => "121312"
        // "credit" => "3123"
        // "des" => "3123"
        // "bank_img" => "122809524_141499897664004_7844290338621171893_n.jpg"
        // "images" => "20230220092630ySRYBgtL3Y5oOMehjxJe.jpg"





        return view('pages.bank.form')->with($data);
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

        $save = Bank::create([
            'name' => $request->name,
            'credit' => $request->credit,
            'des' => $request->des,
            'images' => $request->images,
            'type' => $request->type,
        ]);


        return redirect()->route('bank.index')
        ->with('success','Bank created successfully');

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

        $bank = Bank::whereIn('type',['Y','N'])->where('id',$id)->first();



        return view('pages.bank.formedit')->with('bank',$bank);
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


        $updatedata = Bank::where("id", $id)->update([
            'name' => $request->name,
            'credit' => $request->credit,
            'des' => $request->des,
            'images' => $request->images,
            'type' => $request->type,
         ]);


        return redirect()->route('bank.index')
        ->with('success','Bank update successfully');
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



        $updatedata = Bank::where("id", $id)->update([
            'type' => 'D',
         ]);


         return response()->json([
            'msg_return' => 'ลบสำเร็จ',
            'code_return' => 1,
        ]);

    }
}
