<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function loginform(){


        return view('backend.layouts.others.login');
    }
    public function login(Request $request){

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if(Auth::guard('web')->attempt($credentials)){
           return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }
}
