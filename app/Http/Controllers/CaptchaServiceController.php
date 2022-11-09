<?php

namespace App\Http\Controllers;

use App\Models\Captcha;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CaptchaServiceController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }
    public function capthcaFormValidate(Request $request)
    {

      $save = Contact::create([
        'name' => $request->name,
        'tel' => $request->tel,
        'email' => $request->email,
        'message' => $request->message,
        'status' => 'N'
    ]);



return response()->json([
    'msg_return' => 'บันทึกสำเร็จ',
    'code_return' => 1,
]);




    }
    public function reloadCaptcha()
    {

        $ran = Captcha::all()->random(1)->first();

        return response()->json(['ask'=> $ran->ask,'answer'=> $ran->answer]);
    }
}
