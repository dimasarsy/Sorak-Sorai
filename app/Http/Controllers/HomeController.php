<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Lineup;
use App\Models\Sponsor;
use App\Models\Activity;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            'schedules' =>  DB::table('schedules')->where('schedules.status','available')->where('date', '>=', date('Y-m-d'))->limit(1)->get(),
            'activities' => Activity::query()->latest()->get(),
            'lineups' => DB::table('lineups')->latest()->limit(6)->get(),
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

    public function lineup()
    {
        return view('lineup', [
            'title' => "Lineup",
            'lineups' => Lineup::query()->latest()->paginate(12)
        ]);
    }
}
