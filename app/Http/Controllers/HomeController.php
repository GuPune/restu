<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mytime = Carbon::now();
      $daylast =  Carbon::now()->subDays(7);
       // dd($mytime->toDateString());
$date = $mytime->toDateString().' '.'00:00:00';
$datelast = $daylast->toDateString().' '.'00:00:00';
// 2022-12-20 00:00:00

$sumprice = Bill::where('created_at', '>=', $date)->sum('pricetotal');
$bill = Bill::where('created_at', '>=', $date)->count('id');
$orders = Order::where('created_at', '>=', $date)->count('quantity');

$sumpricelast = Bill::where('created_at', '>', $datelast)->sum('pricetotal');
$billlast = Bill::where('created_at', '>', $datelast)->count('id');
$orderslast = Order::where('created_at', '>', $datelast)->count('quantity');

$datas = collect();
$datas['sum'] = $sumprice;
$datas['bill'] = $bill;
$datas['order'] = $orders;
$datas['sumlast'] = $sumpricelast;
$datas['billlast'] = $billlast;
$datas['orderlast'] = $orderslast;

$users = Bill::select(DB::raw("SUM(pricetotal) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->whereYear('created_at', date('Y'))
->groupBy(DB::raw("Month(created_at)"))
->pluck('count', 'month_name');

$labels = $users->keys();
$data = $users->values();



        return view('pages.dashboard.index')->with(compact('datas','labels', 'data'));
    }

    public function perform()
    {


        Auth::logout();

     //   return redirect('/admin/login');

        return redirect('/admin/login');
    }
}
