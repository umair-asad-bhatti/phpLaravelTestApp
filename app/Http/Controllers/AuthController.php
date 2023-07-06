<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {

        return view("LoginForm");
    }


    function handleLogin(Request $request)
    {
        $user = DB::table("users")->where('email', $request['email'])->first();
        if ($user && $request['password']==$user->password) {

            session(['user'=>$user]);
            return redirect("/records");
        } else
            return "username or password is invalid";
    }
    function handleLogout(){
        session()->pull('user');
        return redirect("/login");
    }

    //registration below
    function register(){
        return view("RegisterForm_1");
    }
}
