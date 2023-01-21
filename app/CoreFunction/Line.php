<?php

namespace App\CoreFunction;

use App\Models\Call;
use Illuminate\Database\Eloquent\Model;

use App\Models\Generate;
use App\Models\Toe;

class Line extends Model
{




    public static function Linenotifycheckbill($request = null)
    {
        $checktoken = Generate::where('qr_code',$request)->first();

        $toe = Toe::where('id',$checktoken->toe_id)->first();
        $number = $toe->number_toe;
        $str = "โต๊ะ $number : เรียกเก็บคิดเงิน";
        $message =  $str;
        $lineapi = 'f66eNz7LuFQ62BMOaGUZ40eFmz8T3WYbozEnKF81uad'; // ใส่ token key ที่ได้มา
        $mms =  trim($message); // ข้อความที่ต้องการส่ง
        date_default_timezone_set("Asia/Bangkok");
        $chOne = curl_init();
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        // SSL USE
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
        //POST
        curl_setopt( $chOne, CURLOPT_POST, 1);

        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");

        curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);

        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);

        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $chOne );


    }
    public static function Linenotify($request = null)
    {

        $checktoken = Generate::where('qr_code',$request['token'])->first();
        $toe = Toe::where('id',$checktoken->toe_id)->first();

        $savecall = Call::create([
            "toe_id" => $checktoken->toe_id,
            "message" => $request['note'],
        ]);
       $s = [];
       $s = $request['fitt'] ?? null;


$number = $toe->number_toe;
$note = $request['note'];

if($s){



    if($request['fitt'] == '1'){

        $item = 'ซ้อนส้อม/จาน/แก้วน้ำ';
    }
    if($request['fitt'] == '2'){
        $item = 'จาน';
    }
    if($request['fitt'] == '3'){
        $item = 'แก้วน้ำ';
    }
    $itemtotal = $request['tem'];
    $note = $request['note'] ?? 'ไม่มี';
    $str = "โต๊ะ $number : เรียกพนักงาน ขอเพิ่มเติม $item จำนวน $itemtotal Note: $note";

    $message =  $str;
    $lineapi = 'f66eNz7LuFQ62BMOaGUZ40eFmz8T3WYbozEnKF81uad'; // ใส่ token key ที่ได้มา
    $mms =  trim($message); // ข้อความที่ต้องการส่ง
    date_default_timezone_set("Asia/Bangkok");
    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    // SSL USE
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
    //POST
    curl_setopt( $chOne, CURLOPT_POST, 1);

    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");

    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);

    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);

    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $chOne );


    return $result;

}else {

    $str = "โต๊ะ $number : เรียกพนักงาน $note";

    $message =  $str;
    $lineapi = 'f66eNz7LuFQ62BMOaGUZ40eFmz8T3WYbozEnKF81uad'; // ใส่ token key ที่ได้มา
    $mms =  trim($message); // ข้อความที่ต้องการส่ง
    date_default_timezone_set("Asia/Bangkok");
    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    // SSL USE
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
    //POST
    curl_setopt( $chOne, CURLOPT_POST, 1);

    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");

    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);

    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);

    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $chOne );


    return $result;
}


    }





}
