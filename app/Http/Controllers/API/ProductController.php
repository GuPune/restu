<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Productres;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {

        $data = Productres::where('status','Y')->get();
\Log::info($data);
        return response()->json($data);

    }
}
