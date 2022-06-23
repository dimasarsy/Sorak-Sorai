<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Ticket;
use App\Models\Myticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytickets = auth()->user()->mytickets()->latest()->get(); // Error of intelephense
        return view('dashboard.mytickets', [
            'title' => "Ticketing",
            'mytickets' => $mytickets,
            'tickets' => Ticket::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytickets = auth()->user()->mytickets()->latest()->get(); // Error of intelephense
        return view('ticket-order', [
            'title' => "Ticketing",
            'mytickets' => $mytickets,
            'tickets'    => Ticket::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_id'   => 'required|numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Myticket::create($validatedData);

        return redirect()->to('/dashboard/mytickets')->with('success', 'Thank you for your Order');
    }

    public function payment(Request $request, $id)
    {
        $orders = auth()->user()->orders()->latest()->get();
        $mytickets = Myticket::findOrFail($id);
        $users = Session::get('id');
        $users_test = [
            'data' => json_encode($users),
        ];
        // $users = Users::session();

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
                    'id' => $mytickets->ticket->id,
                    'price' => $mytickets->ticket->price,
                    'quantity' => 1,
                    'name' => $mytickets->ticket->type
                ]
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view('dashboard.mytickets.payment', ['snap_token' => $snapToken, 'orders' => $orders]);
    }

    public function payment_post(Request $request, $id)
    {
        $myticket = Myticket::findOrFail($id);
        $json = json_decode($request->get('json'));
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->status = $json->transaction_status;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('dashboard/mytickets/payment', $myticket->id))->with('alert-success', 'Order berhasil dibuat') : redirect(url('dashboard/mytickets/payment', $myticket->id))->with('alert-failed', 'Terjadi kesalahan');

        // dd();
    }
}
