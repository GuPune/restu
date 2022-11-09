<?php

namespace App\Http\Controllers;

use App\Models\NewContent;
use Illuminate\Http\Request;
use App\CoreFunction;
use App;
use Illuminate\Support\Facades\App as FacadesApp;

class FrontNewController extends Controller
{
    //

    public function index()
    {
        //

$new = NewContent::where('type','1')->get();

$lastnew = NewContent::orderBy('updated_at','desc')->take(5)->get();



return view('pages.front.news')->with('data',$new)->with('lastnew',$lastnew);




    }

    public function show($id)
    {
        //

$updatev = CoreFunction\Cutstr::updateview($id);


$newone = NewContent::where('id',$id)->first();
$lastnew = NewContent::orderBy('updated_at','desc')->take(5)->get();

return view('pages.front.newsone')->with('data',$newone)->with('lastnew',$lastnew);;

    }

    public function edit($id)
    {
        //

dd('edit');



    }

    public function lang($locale)
    {

     //   App::setLocale($locale);

        session()->put('locale', $locale);

        if (session()->has('locale')) {
            FacadesApp::setLocale(session()->get('locale'));
        }

        return redirect()->back();
    }
}
