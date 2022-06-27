<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::query()->latest()->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'users' => User::query()->latest()->get()
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
            'name' => 'required|max:100',
            "username"  => 'required|max:255|unique:users|max:255',
            'email' => 'required|email:dns|unique:users|max:255',
            'password'  => 'required|min:5|max:255',
            'is_vendor' => 'required|boolean',
        ]);

             // hash password
             $validatedData['password'] = Hash::make($validatedData['password']);
             // create data user into database
             User::create($validatedData);
             // redirect to login page
             return redirect()->to('/dashboard/users')->with("success", "New User has been Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user'      => $user,
            'users'    => User::all()
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
        $rules = [
            'name' => 'required|max:100',
            'is_vendor' => 'required|boolean',
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id) -> update($validatedData);

        return redirect()->to('/dashboard/users')->with('success', 'Users has selected as Vendor.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->to('/dashboard/users')->with('deleted', 'User has been deleted.');
    }
}
