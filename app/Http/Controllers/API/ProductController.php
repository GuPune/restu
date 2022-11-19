<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Productres;
use App\Models\Typeoffoods;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //

    public function index()
    {

        $data = Productres::where('status','Y')->get();

        return response()->json($data);

    }
    public function typeres()
    {

        $data = Typeoffoods::where('status','Y')->get();
        return response()->json($data);
    }

    public function fitter(Request $request)
    {

        if($request->id == 0){
            $data = Productres::where('status','Y')->get();
        }elseif($request->id != 0){
            $data = Productres::where('status','Y')->where('type_of_food_id',$request->id)->get();
        }

        return response()->json($data);

    }




}
