<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class HomescheduleController extends Controller
{
    public function index()
    {

        if (Auth::user() == null) {
            $schedule = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'));

            if (request('search')) {
                if (request('filter') == 1) {
                    $schedule->where('name', 'like', '%' . request('search') . '%');
                } elseif ((request('filter') == 2)) {
                    $schedule->where('price', request('search'));
                } elseif ((request('filter') == 3)) {
                    $schedule->where('author', 'like', '%' . request('search') . '%');
                }
            }

            if (request('searchDate')) {
                $schedule->where('date', request('searchDate'));
            }

            return view('schedule.Home.home', [
                "title" => "Schedule",
                "active" => "home",
                // "schedules" => $schedule->simplePaginate(4),
                "schedules" => $schedule,
                "filters" => Filter::all(),
            ]);
        }

        $schedule = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'));
        $muthawifSchedule = Schedule::where('user_id', Auth::user()->id)->where('status', "available")->where('date', '>=', date('Y-m-d'));

        if (request('search')) {
            if (request('filter') == 1) {
                $schedule->where('name', 'like', '%' . request('search') . '%');
                $muthawifSchedule->where('name', 'like', '%' . request('search') . '%');
            } elseif ((request('filter') == 2)) {
                $schedule->where('price', request('search'));
                $muthawifSchedule->where('price', request('search'));
            } elseif ((request('filter') == 3)) {
                $schedule->where('author', 'like', '%' . request('search') . '%');
                // $muthawifSchedule->where('lecturer', request('search'));
            }
        }

        if (request('searchDate')) {
            $schedule->where('date', request('searchDate'));
            $muthawifSchedule->where('date', request('searchDate'));
        }

        return view('schedule.Home.home', [
            "title" => "Schedule",
            "active" => "home",
            "schedules" => $schedule->simplePaginate(10),
            "filters" => Filter::all(),
        ]);
    }
}
