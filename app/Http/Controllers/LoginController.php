<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function procLogin()
    {
        $validate = request()->validate([
            'email'=>['required','email'],
            'password'=>['required','string']
        ]);
        if(auth()->attempt($validate)){
            return redirect("dashboard");
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Email atau Password tidak sesuai'
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
