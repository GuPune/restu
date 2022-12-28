<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExportReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $y,$m;

 function __construct($y,$m) {
        $this->year = $y;
        $this->mo = $m;
 }
    public function collection()
    {




    $today = \Carbon\Carbon::today(); //Current Date and Time

    $a = $today->format('d');


    $gets = $this->year .'-'. $this->mo.'-'.$a;




    $firstDayofMonth =    \Carbon\Carbon::parse($gets)->startOfMonth()->toDateString();
    $lastDayofMonth =    \Carbon\Carbon::parse($gets)->endOfMonth()->toDateString();

    \Log::info($firstDayofMonth);
    \Log::info($lastDayofMonth);

    // $firstDayofMonth =    \Carbon\Carbon::parse($gets)->startOfMonth()->toDateString();
    // $lastDayofMonth =    \Carbon\Carbon::parse($gets)->endOfMonth()->toDateString();
    $gets = '2022-12-26';

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

        return collect($reportday);

    }
}
