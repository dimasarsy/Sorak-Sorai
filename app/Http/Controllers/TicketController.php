<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tickets.index', [
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
        return view('dashboard.tickets.create', [
            'tickets' => Ticket::query()->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|max:100',
            'price' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Ticket::create($validatedData);

        return redirect()->to('/dashboard/tickets')->with('success', 'Ticket has been Create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('dashboard.tickets.edit', [
            'ticket'      => $ticket,
            'tickets'    => Ticket::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $rules = [
            'type' => 'required|max:100',
            'price' => 'required',
        ];

        if ($request->slug !== $ticket->slug) {
            $rules['slug'] = 'required|unique:tickets';
        }

        $validatedData = $request->validate($rules);

        Ticket::where('id', $ticket->id) -> update($validatedData);

        return redirect()->to('/dashboard/tickets')->with('success', 'Ticket has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->to('/dashboard/tickets')->with('deleted', 'Ticket has been deleted.');
    }
}