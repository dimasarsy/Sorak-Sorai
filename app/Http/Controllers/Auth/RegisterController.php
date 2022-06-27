<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register',[
            "title" => "Register",
        ]);
    }

    public function store(Request $request)
    {
        // validate requests
        $validatedData = $request->validate([
            "name"  => 'required|max:255',
            "username"  => 'required|max:255|unique:users|max:255',
            'email' => 'required|email:dns|unique:users|max:255',
            'password'  => 'required|min:5|max:255',
        ]);
 
        // hash password
        $validatedData['password'] = Hash::make($validatedData['password']);
        // create data user into database
        User::create($validatedData);
        // redirect to login page
        return redirect()->to('/login')->with("success", "Registration successfully! Please Login");
    }
}
