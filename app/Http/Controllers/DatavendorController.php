<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Lineup;
use App\Models\Vendor;
use App\Models\Datavendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatavendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('vendors.index', [
            'title' => "vendor",
            'users' => User::query()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.index', [
            'title' => "vendor",
            'types' => Type::query()->latest()->get()
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
            'type_id'   => 'required|numeric',
            'address' => 'required|max:255',
            'sosmed' => 'required|max:255',
            'picture' => 'required|image|file|max:1024'

        ]);

        $validatedData['picture'] = $request->file('picture')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;

        Datavendor::create($validatedData);

        return redirect()->to('/vendors')->with('success', 'Thank You........');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('vendors.show', [
            'users' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('vendors.edit', [
            'users' => User::query()->latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
