<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\LineupController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\marketsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\MyTicketController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AboutFestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TicketingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DatavendorController;
use App\Http\Controllers\JoinVendorController;
use App\Http\Controllers\LineupFestController;
use App\Http\Controllers\HomescheduleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardVendorController;
use App\Http\Controllers\DashboardVendorReqController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "index"]);

Route::get('/about', [AboutFestController::class, "index"]);
Route::get('/lineup', [LineupFestController::class, "index"]);

// popup schedule
// Route::view('partials/get-form','partials.popup')->name('popup');

// posts routes
Route::get('/posts', [PostController::class, "index"]);
Route::get('/posts/{post:slug}', [PostController::class, "show"])->middleware('auth');

// categories
Route::get('/categories', [categoriesController::class, "index"]);

// users
Route::get('/vendor/{author:username}', [UserController::class, "postsByUser"]);

// auth
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::delete('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard-vendor', [DashboardController::class, 'dash_vendor'])->middleware('auth');

// dashboard posts
Route::get('/dashboard/posts/slug', [DashboardPostController::class, 'slug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// dashboard categories
Route::get('/dashboard/categories/slug', [AdminController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminController::class)->except('show')->middleware('admin');

// dashboard types
// Route::get('/dashboard/types/slug', [TypeController::class, 'slug'])->middleware('admin');
// Route::resource('/dashboard/types', TypeController::class)->except('show')->middleware('admin');

// dashboard types
// Route::get('/dashboard/tickets/slug', [TicketController::class, 'slug'])->middleware('admin');
// Route::resource('/dashboard/tickets', TicketController::class)->except('show')->middleware('admin');

//dashboard lineup
Route::get('/dashboard/lineups/slug', [LineupController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/lineups', LineupController::class)->middleware('admin');

//dashboard sponsor
Route::get('/dashboard/sponsors/slug', [SponsorController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/sponsors', SponsorController::class)->middleware('admin');

//dashboard media
Route::get('/dashboard/medias/slug', [MediaController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/medias', MediaController::class)->middleware('admin');

//dashboard activity
Route::get('/dashboard/activities/slug', [ActivityController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/activities', ActivityController::class)->middleware('admin');

//dashboard gallery
Route::get('/dashboard/galleries/slug', [GalleryController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/galleries', GalleryController::class)->middleware('admin');

//dashboard about
// Route::get('/dashboard/abouts/slug', [AboutController::class, 'slug'])->middleware('admin');
// Route::resource('/dashboard/abouts', AboutController::class)->middleware('admin');



//dashboard user
Route::get('/dashboard/users/id', [DashboardUserController::class, 'id'])->middleware('admin');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::resource('/dashboard/admins', DashboardAdminController::class)->middleware('admin');

Route::resource('/dashboard/vendors', DashboardVendorController::class)->middleware('admin');

// Route::resource('/dashboard/vendor_req', DashboardVendorReqController::class)->middleware('admin');


Route::patch('/dashboard/vendors/{users}', 'DashboardVendorReqController@completedUpdate')->name('completedUpdate');

Route::get('/dashboard/vendors/{id}','App\Http\Controllers\DashboardVendorController@status_update')->middleware('admin');


//MIDTRANS TICKETING
Route::get('/schedule', [HomescheduleController::class, "index"]);

Route::get('/scheduleDetail/{schedule}', [ScheduleController::class, "showScheduleDetail"])->middleware('auth');
Route::post('/scheduleDetail/{schedule}', [ScheduleController::class, "payment_post"])->middleware('auth');

Route::get('/orders', [OrderController::class, "myticket"])->middleware('auth');
Route::get('/ordersDetail/{orders}', [OrderController::class, "showOrderDetail"]);
Route::get('/orders/riwayat', [OrderController::class, "riwayat"])->middleware('auth');

Route::get('/dashboard/addSchedule', [ScheduleController::class, "showAddSchedule"])->middleware('auth');
Route::post('/dashboard/addSchedule', [ScheduleController::class, "storeSchedule"])->middleware('auth');

Route::get('/dashboard/updateSchedule/{schedule}', [ScheduleController::class, "showUpdateSchedule"])->middleware('auth');
Route::put('/dashboard/updateSchedule/{schedule}', [ScheduleController::class, "updateSchedule"])->middleware('auth');
Route::delete('/dashboard/delete/{schedule}', [ScheduleController::class, "destroy"])->middleware('auth');

Route::get('/dashboard/scheduleHistory', [ScheduleController::class, "showScheduleHistory"])->middleware('auth');
Route::get('/dashboard/orders', [OrderController::class, "order_admin"])->middleware('auth');


Route::get('/schedule/viewUpcomingSchedule', [ScheduleController::class, "showMuthawifUpcomingSchedule"])->middleware('auth');

// join vendors
Route::get('sch/slug', [JoinVendorController::class, 'slug'])->middleware('auth');
Route::resource('/vendors', JoinVendorController::class)->except('show')->middleware('auth');

//Pengajuan Vendor
Route::get('/pengajuan', [PengajuanController::class, "index"])->middleware('auth');
Route::get('/pengajuan/create', [PengajuanController::class, "create"])->middleware('auth');
Route::post('/pengajuan/store', [PengajuanController::class, "store"])->middleware('auth');
Route::put('/pengajuan/update/{id}', [PengajuanController::class, "update"])->middleware('auth');

//Dashboard Admin Pengajuan
Route::get('/dashboard/pengajuan-vendor', [DashboardVendorReqController::class, 'index'])->middleware('auth');
Route::put('/dashboard/pengajuan-vendor/update/{id}', [DashboardVendorReqController::class, 'update'])->middleware('auth');