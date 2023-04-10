<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('backend.pages.roles.create',compact('permissions'));

    }

    public function store(Request $request){


        $role = Role::create(['name' => $request->name]);
       $permissions = $request->input('permissions');

       if (!empty($permissions)) {
           $role->syncPermissions($permissions);
       }
        return redirect()->back();
    }
}
