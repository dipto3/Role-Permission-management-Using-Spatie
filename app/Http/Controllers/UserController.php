<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        $users = User::all();

        return view('backend.pages.user.index',compact('users'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();

    }
}
