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



        $getypebill = Bill::select(\DB::raw('bill.type_pay,bank.name,bank.images, SUM(bill.pricetotal) as total'))
        ->leftJoin('generate', 'bill.token', '=', 'generate.qr_code')
        ->leftJoin('bank', 'bank.id', '=', 'bill.type_pay')
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

    public function year(Request $request)
    {





$year = DB::select(DB::raw("select YEAR(date) AS year,
SUM(IF(MONTH(date)=1,`pricetotal`,NULL)) AS `Jan`,
SUM(IF(MONTH(date)=2,`pricetotal`,NULL)) AS `Feb`,
SUM(IF(MONTH(date)=3,`pricetotal`,NULL)) AS `Mar`,
SUM(IF(MONTH(date)=4,`pricetotal`,NULL)) AS `Apr`,
SUM(IF(MONTH(date)=5,`pricetotal`,NULL)) AS `May`,
SUM(IF(MONTH(date)=6,`pricetotal`,NULL)) AS `Jun`,
SUM(IF(MONTH(date)=7,`pricetotal`,NULL)) AS `Jul`,
SUM(IF(MONTH(date)=8,`pricetotal`,NULL)) AS `Aug`,
SUM(IF(MONTH(date)=9,`pricetotal`,NULL)) AS `Sep`,
SUM(IF(MONTH(date)=10,`pricetotal`,NULL)) AS `Oct`,
SUM(IF(MONTH(date)=11,`pricetotal`,NULL)) AS `Nov`,
SUM(IF(MONTH(date)=12,`pricetotal`,NULL)) AS `Dec`
FROM bill
GROUP BY year"));



//return view('pages.report.year', array('year' => $data));

      return view('pages.report.year')->with('year',$year);
    }



}
