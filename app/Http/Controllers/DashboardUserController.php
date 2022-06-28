<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            "name"  => 'required|max:255',
            "username"  => 'required|max:255|unique:users|max:255',
            'email' => 'required|email:dns|unique:users|max:255',
            'password'  => 'required|min:5|max:255',
            'role_id'   => 'required|numeric',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
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
            'user'      => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $rules = [
        //     "name"  => 'required|max:255',
        //     "username"  => 'required|max:255|unique:users|max:255',
        //     'email' => 'required|email:dns|unique:users|max:255',
        //     'password'  => 'required|min:5|max:255',
        //     'role_id'   => 'required|numeric',
        // ];

        // $validatedData = $request->validate($rules);

        // if (
        //     $request->name == $user->name && $request->username == $user->username &&
        //     $request->email == $user->email && $request->role_id == $user->role_id
        // ) {
        //     return redirect('/dashboard/users')->with('noUpdate', 'There is no update on User!');
        // }

        // User::where('id', $user->id) -> update($validatedData);

        // return redirect()->to('/dashboard/users')->with('success', 'User has been updated.');
        if($request->email !== null){
            $this->validate($request, [
                'email' => 'email',
            ]);
        }
        if($request->password !== null){
            $this->validate($request, [
                'password' => 'min:6'
            ]);
        }

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);


        if ($user) {
            return redirect('/dashboard/users')->with(['success' => 'Users has been updated successfully']);
        }else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
            ]);
        }
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


    public function data_vendor()
    {

        return view('dashboard.vendors.index', [
            'users' => User::query()->latest()->get(),
            "pengajuans"  => Pengajuan::where('status', "Lolos")
                            ->where('ktp', null)
                            ->where('sertifikat', null)
                            ->join('users', 'pengajuans.user_id', '=', 'users.id')
                            ->select('pengajuans.*', 'users.username as uname')
                            ->get(),
        ]);
    }
}
