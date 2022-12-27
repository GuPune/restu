<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportDayController extends Controller
{
    //

    public function index(Request $request)
    {
        \Log::info($request->all());
        $reportday = DB::select(
            DB::raw("SELECT `dateList`.`Date`,
            CASE WHEN `yt`.`date` IS NULL THEN 0
            ELSE SUM(`yt`.`total`)
            END AS `amt`
        FROM
        (
            SELECT `a`.`Date`
            FROM (
                SELECT LAST_DAY('2022-12-31') - INTERVAL (`a`.`a` + (10 * `b`.`a`) + (100 * `c`.`a`)) DAY AS `Date`
                FROM (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `a`
                CROSS JOIN (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `b`
                CROSS JOIN (SELECT 0 AS `a` UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS `c`
            ) AS `a`
            WHERE `a`.`Date` between '2022-12-01' and LAST_DAY('2022-12-31')
        ) AS `dateList`
        LEFT JOIN `bill` AS `yt` ON `dateList`.`Date` = DATE(`yt`.`date`)
        GROUP BY `dateList`.`Date`
        ORDER BY `dateList`.`Date` ASC")
         );


        return view('pages.report.day')->with('report',$reportday);
    }

}
