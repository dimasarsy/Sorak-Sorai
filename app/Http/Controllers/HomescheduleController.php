<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomescheduleController extends Controller
{
    public function index()
    {
        $activeFilter = 'no';
        // $schedules = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'));
        $schedules = DB::table('schedules as schedule')
            ->where('schedule.status', "available")
            ->where('schedule.date', '>=', date('Y-m-d'))->paginate(3);


        if (request('searchName')) {
            // $schedules = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'))->where('user_id->name', 'like', '%' . request('searchName') . '%');
            $schedules = DB::table('schedules as schedule')
                // ->join('users as user', 'user.id', '=', 'schedule.user_id')
                ->where('schedule.name',  'like', '%' . request('searchName') . '%')->paginate(3);
        }

        if (request('searchDate')) {
            // $schedules = Schedule::where('status', "available")->where('date', request('searchDate'));
            $schedules = DB::table('schedules as schedule')
                ->join('users as user', 'user.id', '=', 'schedule.user_id')
                ->where('schedule.status', "available")
                ->where('schedule.date', request('searchDate'))->paginate(3);
        }

        if (request('submit') == 'thisWeek') {
            // $schedules = Schedule::where('status', "available")->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $schedules = DB::table('schedules as schedule')
                ->join('users as user', 'user.id', '=', 'schedule.user_id')
                ->where('schedule.status', "available")
                ->whereBetween('schedule.date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->paginate(3);

            $activeFilter = 'thisWeek';
        }

        if (request('submit') == 'thisMonth') {
            // $schedules = Schedule::where('status', "available")->whereMonth('date', date('m'))->whereYear('date', date('Y'));
            $schedules = DB::table('schedules as schedule')
                ->join('users as user', 'user.id', '=', 'schedule.user_id')
                ->where('schedule.status', "available")
                ->whereMonth('schedule.date', date('m'))
                ->whereYear('schedule.date', date('Y'))->paginate(3);

            $activeFilter = 'thisMonth';
        }

        if (request('submit') == 'thisYear') {
            // $schedules = Schedule::where('status', "available")->whereYear('date', date('Y'));
            $schedules = DB::table('schedules as schedule')
                ->join('users as user', 'user.id', '=', 'schedule.user_id')
                ->where('schedule.status', "available")
                ->whereYear('schedule.date', date('Y'))->paginate(3);

            $activeFilter = 'thisYear';
        }

        return view('schedule.Home.home', [
            "title" => "Schedule",
            "active" => "marketplace",
            "activeFilter" => $activeFilter,
            "schedules" => $schedules,
        ]);
    }
}
