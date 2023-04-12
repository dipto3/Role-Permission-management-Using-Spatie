<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginform(){


        return view('backend.layouts.others.login');
    }
    public function login(){
        
    }
}
