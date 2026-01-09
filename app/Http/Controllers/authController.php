<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function registerpage()
    {
        return view('Auth.register');
    }
    public function loginpage()
    {
        return view('Auth.login');
    }
    public function registeruser(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('loginpage')->with('success', 'User Account Created');
        } else {
            return "Not Inserted";
        }
    }
    public function loginuser(Request $req)
    {
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($data)) {
            return redirect()->route('adminindex');
        } else {
            return back()->with('error', 'User mail and password is invalid');
        }
    }
    public function logout()
    {
        Auth::logout(); // Logs out the currently authenticated user
        return redirect()->route('loginpage')->with('success', 'You have been logged out');
    }
}
