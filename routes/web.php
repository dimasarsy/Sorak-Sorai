<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LineupController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
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

// ================ HALAMAN HOME - CERITA - PENAMPIL =====================
Route::get('/', [HomeController::class, "index"]);
Route::get('/about', [HomeController::class, "about"]);
Route::get('/lineup', [HomeController::class, "lineup"]);

// ================ HALAMAN BELANJA =====================
Route::get('/posts', [PostController::class, "index"]);
Route::get('/posts/{post:slug}', [PostController::class, "show"])->middleware('auth');
Route::get('/vendor/{author:username}', [PostController::class, "postsByUser"]);

// ================ AUTH LOGIN - REGISTER - LOGOUT =====================

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::delete('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// ================ SCHEDULE - MIDTRANS TICKETING =====================
Route::get('/schedule', [ScheduleController::class, "index"]);

Route::get('/scheduleDetail/{schedule}', [ScheduleController::class, "showScheduleDetail"])->middleware('auth');
Route::post('/scheduleDetail/{schedule}', [ScheduleController::class, "payment_post"])->middleware('auth');

// ================ DASHBOARD SCHEDULE =====================
Route::get('/dashboard/scheduleHistory', [ScheduleController::class, "showScheduleHistory"])->middleware('auth');

Route::get('/dashboard/addSchedule', [ScheduleController::class, "showAddSchedule"])->middleware('auth');
Route::post('/dashboard/addSchedule', [ScheduleController::class, "storeSchedule"])->middleware('auth');

Route::get('/dashboard/updateSchedule/{schedule}', [ScheduleController::class, "showUpdateSchedule"])->middleware('auth');
Route::put('/dashboard/updateSchedule/{schedule}', [ScheduleController::class, "updateSchedule"])->middleware('auth');

Route::delete('/dashboard/delete/{schedule}', [ScheduleController::class, "destroy"])->middleware('auth');

// ================ ORDERS =====================
Route::get('/orders', [OrderController::class, "myticket"])->middleware('auth');
Route::get('/ordersDetail/{orders}', [OrderController::class, "showOrderDetail"]);
Route::get('/orders/riwayat', [OrderController::class, "riwayat"])->middleware('auth');

// ================ DASHBOARD ORDERS =====================
Route::get('/dashboard/orders', [OrderController::class, "order_admin"])->middleware('auth');


// ================ PENGAJUAN VENDOR =====================
Route::get('/pengajuan', [PengajuanController::class, "index"])->middleware('auth');
Route::get('/pengajuan/create', [PengajuanController::class, "create"])->middleware('auth');
Route::post('/pengajuan/store', [PengajuanController::class, "store"])->middleware('auth');
Route::put('/pengajuan/update/{id}', [PengajuanController::class, "update"])->middleware('auth');

// ================ DASHBOARD PENGAJUAN VENDOR =====================
Route::get('/dashboard/pengajuan-vendor', [DashboardVendorReqController::class, 'index'])->middleware('auth');
Route::put('/dashboard/pengajuan-vendor/update/{id}', [DashboardVendorReqController::class, 'update'])->middleware('auth');

// ===================================
// =========== DASHBOARD =============
// ===================================

// ================ DASHBOARD HOME =====================
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard-vendor', [DashboardController::class, 'dash_vendor'])->middleware('auth');

// ================ DASHBOARD ADMIN - USER - VENDOR =====================
Route::resource('/dashboard/admins', DashboardAdminController::class)->middleware('admin');

Route::get('/dashboard/users/id', [DashboardUserController::class, 'id'])->middleware('admin');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');


// Route::resource('/dashboard/vendors', DashboardVendorController::class)->middleware('admin');
Route::get('/dashboard/vendors', [DashboardUserController::class, 'data_vendor'])->middleware('admin');

// ================ DASHBOARD PRODUCT =====================
Route::get('/dashboard/posts/slug', [DashboardPostController::class, 'slug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// ================ DASHBOARD CATEGORY PRODUCT =====================
Route::get('/dashboard/categories/slug', [AdminController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminController::class)->except('show')->middleware('admin');

// ================ DASHBOARD LINEUP =====================
Route::get('/dashboard/lineups/slug', [LineupController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/lineups', LineupController::class)->middleware('admin');

// ================ DASHBOARD SPONSOR =====================
Route::get('/dashboard/sponsors/slug', [SponsorController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/sponsors', SponsorController::class)->middleware('admin');

// ================ DASHBOARD MEDIA =====================
Route::get('/dashboard/medias/slug', [MediaController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/medias', MediaController::class)->middleware('admin');

// ================ DASHBOARD ACTIVITY =====================
Route::get('/dashboard/activities/slug', [ActivityController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/activities', ActivityController::class)->middleware('admin');

// ================ DASHBOARD GALLERY =====================
Route::get('/dashboard/galleries/slug', [GalleryController::class, 'slug'])->middleware('admin');
Route::resource('/dashboard/galleries', GalleryController::class)->middleware('admin');