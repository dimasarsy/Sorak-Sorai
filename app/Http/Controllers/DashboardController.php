<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Post;
use App\Models\Lineup;
use App\Models\Pengajuan;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        $count_users = DB::table('users')
            ->where('users.role_id','!=','1')
            ->selectRaw('MAX(created_at) as created_at, COUNT(*) as alldata')
            ->get();
        
        $count_orders = DB::Table('orders')
            ->selectRaw('MAX(created_at) as created_at, COUNT(*) as alldata')
            ->get();
        
        $count_request = DB::Table('pengajuans')
            ->where('status','Review')
            ->selectRaw('MAX(created_at) as created_at, COUNT(*) as alldata')
            ->get();
                
        $count_posts  = DB::table('posts')
            ->where('user_id', auth()->user()->id)
            ->selectRaw('MAX(created_at) as created_at, COUNT(*) as alldata')
            ->get();

        $count_schedules_active = Schedule::where('status','available')
            ->where('availableScheduleDate','>=', NOW())
            ->selectRaw('MAX(schedules.created_at) as created_at, COUNT(*) as alldata')
            // ->where('users.role_id','1')
            ->get();
        
        $count_schedules_soon = Schedule::where('status','soon')
            ->where('enddate', '>=', date('Y-m-d'))
            ->join('users', 'schedules.user_id', '=', 'users.id')
            ->selectRaw('MAX(schedules.created_at) as created_at, COUNT(*) as alldata')
            // ->where('users.role_id','1')
            ->get();
        
        $count_schedules_vip = Schedule::where('vip', 1)
            ->join('users', 'schedules.user_id', '=', 'users.id')
            ->selectRaw('MAX(schedules.created_at) as created_at, COUNT(*) as alldata')
            // ->where('users.role_id','1')
            ->get();

        $merchant_aktif = Post::join('users','users.id','=','posts.user_id')
            ->selectRaw('COUNT(*) as m_aktif, users.name as uname, posts.user_id')
            ->groupBy('user_id','uname')
            ->orderBy('m_aktif','DESC')
            ->limit(1)
            ->get();

        $merchant_pasif = Post::join('users','users.id','=','posts.user_id')
            ->selectRaw('COUNT(*) as m_pasif, users.name as uname, posts.user_id')
            ->groupBy('user_id','uname')
            ->orderBy('m_pasif','ASC')
            ->limit(1)
            ->get();

        $merchandise = Post::join('categories','categories.id','=','posts.categories_id')
            // ->select('categories.name as kategori')
            ->orderBy('created_at','desc')
            ->limit(5)
            ->get();

        $lineup = Lineup::join('schedules','schedules.id','=','lineups.schedule_id')
            ->where('lineups.date', '>=' , NOW())
            ->orderBy('lineups.date', 'ASC')
            ->orderBy('lineups.starttime','ASC')
            ->select('schedules.name as sname','lineups.availableScheduleDate','lineups.name','lineups.dueDateSchedule')
            ->limit(5)
            ->get();
        
        
        $my_merchandise = Post::join('categories','categories.id','=','posts.categories_id')
            // ->select('categories.name as kategori')
            ->where('posts.user_id', auth()->user()->id)
            ->orderBy('created_at','desc')
            ->limit(5)
            ->get();

        $schedules_active = Schedule::where('status', 'available')
            ->where('availableScheduleDate','>=', NOW())
            ->limit(5)
            ->get();

        $schedules_soon = Schedule::where('status', 'soon')
            ->where('availableScheduleDate','>=', NOW())
            ->limit(5)
            ->get();

        $schedules_vip= Schedule::where('vip', 1)
            ->where('availableScheduleDate','>=', NOW())
            ->limit(5)
            ->get();

        $data_merchant_aktif = Post::join('users','users.id','=','posts.user_id')
            ->join('roles','roles.id','=','users.role_id')
            ->selectRaw('COUNT(*) as m_aktif, users.name as name, users.username as uname, roles.name as role, posts.user_id')
            ->groupBy('user_id','name','uname','role')
            ->orderBy('m_aktif','DESC')
            ->get();

        $data_merchant_pasif = Post::join('users','users.id','=','posts.user_id')
            ->join('roles','roles.id','=','users.role_id')
            ->selectRaw('COUNT(*) as m_aktif, users.name as name, users.username as uname, roles.name as role, posts.user_id')
            ->groupBy('user_id','name','uname','role')
            ->orderBy('m_aktif','ASC')
            ->get();

        // CHART

        $event = Order::join('schedules','schedules.id','=','orders.schedule_id')
        ->select(DB::raw("schedules.name as eventname, COUNT(*) as jumlah_order"))
        ->groupBy(DB::raw("schedules.name"))
        ->get();

        $dataPoint2 = [];

        foreach ($event as $event) {

            $dataPoint2[] = array(
                "name" => $event['eventname'],
                "y" => $event['jumlah_order']
            );
        }


        $aktifitasBulan = Schedule::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('date', 2023)
            ->groupBy(\DB::raw("Month(date)"))
            ->orderBy('date','asc')
            ->pluck('count');
        
        $namabulan = Schedule::select(DB::raw("MONTHNAME(date) as namabulan"))
            ->groupBy(DB::raw("MONTHNAME(date)"))
            ->orderBy('date','asc')
            ->pluck('namabulan');

        $order = Order::select(DB::raw("status as status, SUM(gross_amount) as total
            , SUM(case when Month(created_at) = '1' then gross_amount end) as jumlah1
            , SUM(case when Month(created_at) = '2' then gross_amount end) as jumlah2
            , SUM(case when Month(created_at) = '3' then gross_amount end) as jumlah3
            , SUM(case when Month(created_at) = '4' then gross_amount end) as jumlah4
            , SUM(case when Month(created_at) = '5' then gross_amount end) as jumlah5
            , SUM(case when Month(created_at) = '6' then gross_amount end) as jumlah6
            , SUM(case when Month(created_at) = '7' then gross_amount end) as jumlah7
            , SUM(case when Month(created_at) = '8' then gross_amount end) as jumlah8
            , SUM(case when Month(created_at) = '9' then gross_amount end) as jumlah9
            , SUM(case when Month(created_at) = '10' then gross_amount end) as jumlah10
            , SUM(case when Month(created_at) = '11' then gross_amount end) as jumlah11
            , SUM(case when Month(created_at) = '12' then gross_amount end) as jumlah12
        
        "))
        // ->whereYear('aktifitas.created_at', date('Y'))
        // ->orderBy(DB::raw('COUNT(*)'),'DESC')
        ->groupBy(DB::raw("status"))
        ->get();
    
        
    $dataPoints = [];

    foreach ($order as $order) {

        $dataPoints[] = array(
            "name" => $order['status'],
            "data" => [
                intval($order['jumlah1']),
                intval($order['jumlah2']),
                intval($order['jumlah3']),
                intval($order['jumlah4']),
                intval($order['jumlah5']),
                intval($order['jumlah6']),
                intval($order['jumlah7']),
                intval($order['jumlah8']),
                intval($order['jumlah9']),
                intval($order['jumlah10']),
                intval($order['jumlah11']),
                intval($order['jumlah12']),
            ],
        );
    }

    $order = Order::join('schedules','schedules.id','=','orders.schedule_id')
        ->select('orders.uname','schedules.name as event','orders.gross_amount','orders.created_at','orders.status')
        ->limit(5)->latest()->get();

    $request = Pengajuan::where('status','review')->get();

        // return response()->json(
        //     compact('count_merchant')
        // );
                        
        return view('dashboard.index', [
            'count_schedules_active' => $count_schedules_active,
            'count_schedules_soon' => $count_schedules_soon,
            'count_schedules_vip' => $count_schedules_vip,
            'count_users'      => $count_users,
            'count_orders'    =>  $count_orders,
            'count_request'  =>  $count_request,
            'count_posts'    =>  $count_posts,
            'merchant_aktif' => $merchant_aktif,
            'merchant_pasif' => $merchant_pasif,

            //CHART
            'aktifitasBulan' => $aktifitasBulan,
            'namabulan' => $namabulan,
            "bulan" => json_encode(array(
                "Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Okt","Nov","Des",
            )),
            "data" => json_encode($dataPoints),
            "event" => json_encode($dataPoint2),

            //modal
            'user' => User::query()->limit(5)->latest()->get(),
            'order' => $order ,
            'request' => $request,
            'my_merchandise' => $my_merchandise,
            'schedules_active' => $schedules_active,
            'schedules_soon' => $schedules_soon,
            'schedules_vip' => $schedules_vip,
            'data_merchant_aktif' => $data_merchant_aktif,
            'data_merchant_pasif' => $data_merchant_pasif,

            //table
            'lineup' => $lineup,
            'merchandise' => $merchandise,
            
        ]);


    }
    
    public function dash_vendor()
    {
        return view('dashboard.dashboard-vendor', [
            'posts'      => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
