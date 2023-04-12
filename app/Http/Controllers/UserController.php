<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $user;

    public function __construct(){

        $this->middleware(function($request , $next){
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }


    public function create(){

        $roles = Role::all();


        return view('backend.pages.user.create',compact('roles'));
    }

    public function store(Request $request){
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
       $data = [...$request->except(['password']), 'password' => Hash::make($request->password)];

        $user = User::Create($data);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return redirect()->back();
    }
    public function index(){
        if(is_null($this->user) || !$this->user->can('role.view')){
            abort(403,'Unauthorized Access!');
        }
        $users = User::all();

        return view('backend.pages.user.index',compact('users'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();

    }
}
