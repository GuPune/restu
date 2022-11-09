<?php

namespace App\Http\Controllers;

use App\Models\NewContent;
use Illuminate\Http\Request;
use App\CoreFunction;

class FrontProductController extends Controller
{
    //

    public function index()
    {
        //

$new = NewContent::where('type','3')->get();

$lastnew = NewContent::orderBy('updated_at','desc')->take(5)->get();

return view('pages.front.product')->with('data',$new)->with('lastnew',$lastnew);
    }




    public function show($id)
    {
        //

$updatev = CoreFunction\Cutstr::updateview($id);


$newone = NewContent::where('id',$id)->first();
$lastnew = NewContent::orderBy('updated_at','desc')->take(5)->get();

return view('pages.front.productone')->with('data',$newone)->with('lastnew',$lastnew);;

    }
}
