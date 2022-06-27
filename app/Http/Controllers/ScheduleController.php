<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Schedule;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ScheduleController extends Controller
{
    public function showScheduleDetail(Schedule $schedule)
    {
        //protect if user want to showKeyboardDetail (deleted keyboard) directly from url
        // if ($keyboard->status == "nonAvailable") {
        //     return redirect('/');
        // }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-DiLtax_iJs2J4hqRePRl6sG1';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                //  'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => $schedule['id'],
                    'price' => $schedule['price'],
                    'quantity' => 1,
                    'name' => $schedule['name']
                ]
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view('schedule.Schedule_View.scheduleDetail', [
            "title" => "Schedule Detail",
            "active" => "schedule",
            "schedule" => $schedule,
            'snap_token' => $snapToken
        ]);
    }

    public function payment_post(Request $request, $id)
    {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->user_id = Auth::user()->id;
        $order->uname = Auth::user()->username;
        $order->email = Auth::user()->email;
        $order->number = Auth::user()->name;
        $order->schedule_id = $id;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/orders'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');

        // dd();
    }

    public function showAddSchedule()
    {

        return view("dashboard.schedules.addSchedule", [
            "title" => "Add Schedule",
            "active" => "addSchedule",
        ]);
    }

    public function storeSchedule(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:schedules|min:5",
            "vip" => "required",
            "price" => "required|integer|min:1000",
            "description" => "required|max:510",
            "image" => "required",
            "date" => "required",
            "starttime" => "required",
            "endtime" => "required",
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');


        // $currFile = $request->file('image');

        // $fileName = time() . '_' . $currFile->getClientOriginalName();
        // Storage::putFileAs('public/image', $currFile, $fileName);

        $schedule = new Schedule;
        $schedule->name = $validatedData['name'];
        $schedule->vip = $validatedData['vip'];
        $schedule->price = $validatedData['price'];
        $schedule->description = $validatedData['description'];
        $schedule->image = $validatedData['image'];
        $schedule->date = $validatedData['date'];
        $schedule->starttime = $validatedData['starttime'];

        $time_start = explode(':', $schedule->starttime);
        $hour_start = $time_start[0];
        $minute_start = $time_start[1];

        $schedule->endtime = $validatedData['endtime'];

        $time_end = explode(':', $schedule->endtime);
        $hour_end = $time_end[0];
        $minute_end = $time_end[1];

        $date_start = new Carbon($schedule->date);
        $date_end = new Carbon($schedule->date);

        $schedule->availableScheduleDate = $date_start->addHours($hour_start)->addMinutes($minute_start);
        $schedule->dueDateSchedule = $date_end->addHours($hour_end)->addMinutes($minute_end);
        $schedule->status = "available";
        $schedule->user_id = Auth::user()->id;
        $schedule->author = Auth::user()->name;

        $schedule->save();
        return redirect()->to('/dashboard/scheduleHistory')->with('success', 'Successfull Add New Schedule!');
    }

    public function destroy(Schedule $schedule)
    {
        //softDelete
        Schedule::where('id', $schedule->id)->update(
            [
                "status" => "deleted",
            ]
        );

        return back()->with('success', 'Schedule has been deleted!');
    }

    public function showUpdateSchedule(Schedule $schedule)
    {

        //protect if user want to update schedule (deleted schedule) directly from url
        if ($schedule->status == "not available") {
            return redirect('/');
        }

        return view('dashboard.schedules.updateSchedule', [
            "title" => "Update Schedule",
            "schedule" => $schedule,
            "active" => "updateSchedule",
        ]);
    }

    public function updateSchedule(Request $request, Schedule $schedule)
    {
        if ($request->name == $schedule->name) {
            $validatedData = $request->validate([
                "name" => "required|min:5",
                "vip" => "required",
                "price" => "required|integer|min:1",
                "description" => "required|min:20",
                "image" => "image|file",
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
            ]);
            $validatedData['name'] = $schedule->name;

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

            $validatedData['notifyStatus'] =  'not notified';
            $validatedData['emailNotifyStatus'] =  'not notified';

        } else {
            $validatedData = $request->validate([
                "name" => "required|unique:schedules|min:5",
                "vip" => "required",
                "price" => "required|integer|min:1",
                "description" => "required|min:20",
                "image" => "image|file",
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
            ]);

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

            $validatedData['notifyStatus'] =  'not notified';
            $validatedData['emailNotifyStatus'] =  'not notified';
        }

        if ($request->file('image')) {
            // if ($request->oldImage) {
            //     Storage::delete('public/image/' . $request->oldImage);
            // }

            if ($request->post('old-image')){
                Storage::delete($request->post('old-image'));
            } 
            $validatedData['image'] = $request->file('image')->store('post-images');
            
            // $currFile = $request->file('image');
            // $fileName = $currFile->getClientOriginalName();
            // Storage::putFileAs('public/image', $currFile, $fileName);

        }

        if (
            $request->name == $schedule->name && $request->price == $schedule->price &&
            $request->description == $schedule->description &&
            $request->file('image') == null && $request->date == $schedule->date &&
            $request->starttime == $schedule->starttime && $request->endtime == $schedule->endtime
        ) {
            return redirect('/')->with('noUpdate', 'There is no update on schedule!');
        }

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect()->to('/dashboard/scheduleHistory')->with('success', 'Schedule has been updated.');
    }

    public function showMuthawifUpcomingSchedule()
    {
        $schedule =
            Schedule::where('user_id', Auth::user()->id)
            ->where('status', "available")
            // ->where('date', '>=', date('Y-m-d'))
            // ->where('starttime', '>', date("h:i a"));
            // ->where('availableScheduleDate', '>', Carbon::now()->toDateTimeString())
            ->where('date', '<=', Carbon::now()->addDays(1)->format('Y-m-d'));

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

        return view('schedule.Muthawif.viewUpcomingSchedule', [
            "title" => "View Upcoming Schedule",
            "active" => "viewUpcomingSchedule",
            "schedules" => $schedule->simplePaginate(1),
            "filters" => Filter::all(),
        ]);
    }

    public function showScheduleHistory()
    {

        $schedule = DB::table('schedules')
        ->join('users', 'schedules.user_id', '=', 'users.id')
        ->select('schedules.*', 'users.role_id')
        ->where('users.role_id','1')
        ->get();

        // $schedule = Schedule::all();
        // ->Where('date', '<', date('Y-m-d'));
        // ->where('starttime', '>', date("h:i a"));
        // ->where('availableScheduleDate', '>', Carbon::now()->toDateTimeString());

        // if (request('search')) {
        //     if (request('filter') == 1) {
        //         $schedule->where('name', 'like', '%' . request('search') . '%');
        //     } elseif ((request('filter') == 2)) {
        //         $schedule->where('price', request('search'));
        //     }
        // }

        // if (request('searchDate')) {
        //     $schedule->where('date', request('searchDate'));
        // }

        return view('dashboard.schedules.scheduleHistory', [
            "title" => "Schedule History",
            "active" => "scheduleHistory",
            "schedules" => $schedule,
            "filters" => Filter::all(),
        ]);
    }
}
