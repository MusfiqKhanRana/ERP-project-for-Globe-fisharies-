<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return Auth::user();
            return redirect()->intended('admin/dashboard')
                        ->with('success', 'Signed in');
        }
        // Session::flash('message', "Special message goes here");
        $misscred = "Invalid Credential";
        // return redirect("login")->with('success','Login details are not valid');
        return view('auth.login',compact('misscred'));
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
