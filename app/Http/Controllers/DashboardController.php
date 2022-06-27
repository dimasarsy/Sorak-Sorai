<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
        ->where('users.role_id','!=','1')
        ->get();

        $posts = Post::with(["author", "categories"])
        ->where('posts.user_id',auth()->user()->id)
        ->get();

        $pengajuans = DB::table('Pengajuans')
        ->where('Pengajuans.ktp', '=', null)
        ->where('Pengajuans.sertifikat', '=', null)
        ->where('Pengajuans.status', '=', "Review")
        ->join('Users', 'Pengajuans.user_id', '=', 'Users.id')
        ->select('Pengajuans.*', 'Users.username as uname')
        ->get();

        $schedules = DB::table('schedules as schedule')
        ->join('users', 'schedule.user_id', '=', 'users.id')
        ->select('schedule.*', 'users.role_id')
        ->where('users.role_id','1')
        ->where('schedule.status', "available")
        ->get();

        return view('dashboard.index', [
            'users'      => $users,
            'posts'      => $posts,
            'pengajuans' => $pengajuans,
            'schedules' => $schedules,

        ]);
    }
    public function dash_vendor()
    {
        $posts = Post::with(["author", "categories"])
        ->where('posts.user_id',auth()->user()->id)
        ->get();

        $pengajuans = DB::table('Pengajuans')
        ->where('Pengajuans.user_id',auth()->user()->id)
        ->where('Pengajuans.status', '=', "Lolos")
        ->join('Users', 'Pengajuans.user_id', '=', 'Users.id')
        ->select('Pengajuans.*', 'Users.username as uname')
        ->get();

        return view('dashboard.dashboard-vendor', [
            'posts'      => $posts,
            'pengajuans' => $pengajuans,
        ]);
    }
}
