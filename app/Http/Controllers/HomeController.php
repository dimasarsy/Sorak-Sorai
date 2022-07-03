<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Sponsor;
use App\Models\Activity;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            "title" => "Home",
            'schedules' =>  DB::table('schedules')->join('users', 'schedules.user_id', '=', 'users.id')
                        ->where('schedules.status','available')
                        ->select('schedules.*', 'users.role_id')
                        ->where('users.role_id','1')
                        ->where('date', '>=', date('Y-m-d'))
                        ->orderBy("availableScheduleDate",'asc')
                        ->limit(1)
                        ->get(),
            'activities' => Activity::query()->latest()->get(),
            'lineup' => DB::table('lineups')->where('date', '>=', date('Y-m-d'))->orderBy("availableScheduleDate",'asc')->limit(1)->get(),
            'lineups' => DB::table('lineups')->latest()->get(),
            'sponsors' => Sponsor::query()->latest()->get(),
            'media' => Media::query()->latest()->get()
        ]);

    }

    public function about()
    {
        return view('about', [
            'title' => "About",
            'activities' => Activity::query()->latest()->get(),
            'galleries' => Gallery::query()->latest()->get()

        ]);
    }

    public function coming()
    {
        
        $schedules = DB::table('schedules as schedule')
            ->orderBy('date','asc')
            ->join('users', 'schedule.user_id', '=', 'users.id')
            ->select('schedule.*', 'users.role_id')
            ->where('users.role_id','1')
            ->where('schedule.status', "soon")
            ->where('schedule.date', '>=', date('Y-m-d'))->paginate(3);

        return view('upcoming', [
            'title' => "Upcoming Schedule",
            "schedules" => $schedules,
        ]);
    }
}
