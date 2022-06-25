<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use function PHPUnit\Framework\returnArgument;

class OrderController extends Controller
{
    public function myticket()
    {
        $order = DB::table('orders')->get();
        
        $orders = DB::table('orders')
        ->join('schedules', 'orders.schedule_id', '=', 'schedules.id')
        ->where('schedules.status','available')
        ->select('orders.*', 'schedules.name', 'schedules.image', 'schedules.date', 'schedules.starttime', 'schedules.endtime',  'schedules.price', 'schedules.description','schedules.vip')
        ->paginate(5);

        $orders_user = DB::table('orders')
        ->where('uname', auth()->user()->username)
        ->get();

        // dd($orders);
        $order_count = DB::table('orders')->count();
        // dd($order[0]->order_id);

        for ($i = 0; $i < $order_count; $i++) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order[$i]->order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "\n\n",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1EaUx0YXhfaUpzMko0aHFSZVBSbDZzRzE="
                ),
            ));

            $response = curl_exec($curl);
            if ($i < $order_count) {
                $responses[$i] = json_decode($response, true);
                // continue;
            }
        }

        curl_close($curl);
        // dd($responses);
        // echo $response;
        // dd($responses);

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $token = Http::withToken('SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6');
        // U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY= ubah base64

        // $token = Http::withToken('Basic U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY6');
        // $responses = $token->get(
        //     'https://api.sandbox.midtrans.com/v2/1653400657562/status'
        // );
        // $responseBody = json_decode($responses);
        // dd($responseBody);

        return view("schedule.Orders.index", [
            "title" => "Order",
            "active" => "order",
            'order' => $order,
            'orders_user' => $orders_user,
            'order_count' => $order_count,
            'responses' => $responses,
            'orders' => $orders,
        ]);
    }
    public function riwayat()
    {
        $order = DB::table('orders')->get();
        
        $orders = DB::table('orders')
        ->join('schedules', 'orders.schedule_id', '=', 'schedules.id')
        ->where('schedules.status','not available')
        ->select('orders.*', 'schedules.name', 'schedules.image', 'schedules.date', 'schedules.starttime', 'schedules.endtime',  'schedules.price', 'schedules.description', 'schedules.status', 'schedules.vip')
        ->paginate(5);

        $orders_user = DB::table('orders')
        ->where('uname', auth()->user()->username)
        ->get();

        // dd($orders);
        $order_count = DB::table('orders')->count();
        // dd($order[0]->order_id);

        for ($i = 0; $i < $order_count; $i++) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order[$i]->order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "\n\n",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1EaUx0YXhfaUpzMko0aHFSZVBSbDZzRzE="
                ),
            ));

            $response = curl_exec($curl);
            if ($i < $order_count) {
                $responses[$i] = json_decode($response, true);
                // continue;
            }
        }

        curl_close($curl);
        // dd($responses);
        // echo $response;
        // dd($responses);

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $token = Http::withToken('SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6');
        // U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY= ubah base64

        // $token = Http::withToken('Basic U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY6');
        // $responses = $token->get(
        //     'https://api.sandbox.midtrans.com/v2/1653400657562/status'
        // );
        // $responseBody = json_decode($responses);
        // dd($responseBody);

        return view("schedule.Orders.riwayat", [
            "title" => "Order",
            "active" => "order",
            'order' => $order,
            'order_count' => $order_count,
            'responses' => $responses,
            'orders' => $orders,
            'orders_user' => $orders_user
        ]);
    }
    public function showOrderDetail(Order $orders)
    {   

        $order = DB::table('orders')->get();

        $order_count = DB::table('orders')->count();

        for ($i = 0; $i < $order_count; $i++) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order[$i]->order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "\n\n",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1EaUx0YXhfaUpzMko0aHFSZVBSbDZzRzE="
                ),
            ));

            $response = curl_exec($curl);
            if ($i < $order_count) {
                $responses[$i] = json_decode($response, true);
                // continue;
            }
        }

        curl_close($curl);

        return view("schedule.Orders.view", [
            "title" => "Order",
            "active" => "order",
            'orders' => $orders,
            'order' => $order,

            'order_count' => $order_count,
            'responses' => $responses,

        ]);
    }

    public function order_admin()
    {
        $schedule = DB::table("schedules")->get();
        $order = DB::table('orders')->get();

        $order_count = DB::table('orders')->count();
        // dd($order[0]->order_id);

        for ($i = 0; $i < $order_count; $i++) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order[$i]->order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "\n\n",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1EaUx0YXhfaUpzMko0aHFSZVBSbDZzRzE="
                ),
            ));

            $response = curl_exec($curl);
            if ($i < $order_count) {
                $responses[$i] = json_decode($response, true);
                // continue;
            }
        }

        curl_close($curl);
        // dd($responses);
        // echo $response;
        // dd($responses);

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $token = Http::withToken('SB-Mid-server-DBl98WA_sgge6xdFShnqujZ6');
        // U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY= ubah base64

        // $token = Http::withToken('Basic U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY6');
        // $responses = $token->get(
        //     'https://api.sandbox.midtrans.com/v2/1653400657562/status'
        // );
        // $responseBody = json_decode($responses);
        // dd($responseBody);

        return view("dashboard.schedules.order", [
            "title" => "Order",
            "active" => "order",
            'order' => $order,
            'schedule' => $schedule,
            'order_count' => $order_count,
            'responses' => $responses
        ]);
    }
}
