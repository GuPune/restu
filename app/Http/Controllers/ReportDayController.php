<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReport;
use App\Models\Bill;

class ReportDayController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {


        $today = \Carbon\Carbon::today(); //Current Date and Time

$a = $today->format('d');



        if($request->txtyear == null){

$yea= \Carbon\Carbon::today();
$y = $today->format('Y');
$request->txtyear = $y;

        }
        if($request->txtmonth == null){
            $mo= \Carbon\Carbon::today();
$m = $today->format('m');
$request->txtmonth = $m;

        }
        $gets = $request->txtyear .'-'. $request->txtmonth.'-'.$a;

        $firstDayofMonth =    \Carbon\Carbon::parse($gets)->startOfMonth()->toDateString();
        $lastDayofMonth =    \Carbon\Carbon::parse($gets)->endOfMonth()->toDateString();


        $reportday = DB::select(
            DB::raw("SELECT `dateList`.`Date`,
            CASE WHEN `yt`.`date` IS NULL THEN 0
            ELSE SUM(`yt`.`total`)
            END AS `amt`
        FROM
        (
            SELECT `a`.`Date`
            FROM (
                SELECT LAST_DAY('$lastDayofMonth') - INTERVAL (`a`.`a` + (10 * `b`.`a`) + (100 * `c`.`a`)) DAY AS `Date`
                FROM (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `a`
                CROSS JOIN (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `b`
                CROSS JOIN (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `c`
            ) AS `a`
            WHERE `a`.`Date` between '$firstDayofMonth' and LAST_DAY('$lastDayofMonth')
        ) AS `dateList`
        LEFT JOIN `bill` AS `yt` ON `dateList`.`Date` = DATE(`yt`.`date`)
        GROUP BY `dateList`.`Date`
        ORDER BY `dateList`.`Date` ASC")
         );

       $years =  $request->txtyear;
       $ms =  $request->txtmonth;

       $resul = Bill::whereBetween('created_at', [$firstDayofMonth, $lastDayofMonth])->sum('pricetotal');


        return view('pages.report.day')->with('report',$reportday)->with(compact('years','ms','resul'));
    }

    public function export($y,$m)
    {

        return Excel::download(new ExportReport($y,$m), 'report.xlsx');

        //return Excel::download(new DisneyplusExport, 'disney.xlsx');
    }

    public function product(Request $request)
    {

\Log::info($request->all());

        $biilall =  Bill::select('bill.bill_number','bill.created_at','bill.total','bill.pricetotal','bill.qty','bill.pricediscount','bill.discount_all_order','generate.status')
        ->leftJoin('generate', 'bill.token', '=', 'generate.qr_code')->where('generate.status','S');

        if($request->inputdaterange){

          $cuts = explode('-',$request->inputdaterange,2);
          $first = substr($request->inputdaterange, 0, -13);  // เอาหน้า
          $to = substr($request->inputdaterange, 13);  // returns "abcde"


          $biilall->whereBetween('bill.created_at', [$first, $to]);

        }

        if($request->billnumber){
            $biilall->where('bill.bill_number',$request->billnumber);
        }

$pro = $biilall->get();

        return view('pages.report.product')->with('report',$pro);

    }


    public function pay(Request $request)
    {



        $getypebill = Bill::select(\DB::raw('bill.type_pay, SUM(bill.pricetotal) as total'))
        ->leftJoin('generate', 'bill.token', '=', 'generate.qr_code')
        ->where('generate.status','S')
        ->groupBy('bill.type_pay')
        ->get();


        if($request->inputdaterange){



            $cuts = explode('-',$request->inputdaterange,2);
            $first = substr($request->inputdaterange, 0, -13);  // เอาหน้า
            $to = substr($request->inputdaterange, 13);  // returns "abcde"


            // $biilall->whereBetween('bill.created_at', [$first, $to]);

          }

        return view('pages.report.pay')->with('typebill',$getypebill);
    }

}
