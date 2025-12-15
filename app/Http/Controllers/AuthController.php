<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect()->route('dashboard.index');
        }
        return back()->with('error', 'username atau password salah!');


    }
    public function logout()
    {
       Auth::logout();
       return redirect()->route('login');
    }
}


