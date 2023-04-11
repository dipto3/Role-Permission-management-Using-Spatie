<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.create',compact('permissions','permission_groups'));

    }

    public function store(Request $request){


        $role = Role::create(['name' => $request->name]);
       $permissions = $request->input('permissions');

       if (!empty($permissions)) {
           $role->syncPermissions($permissions);
       }
        return redirect()->back();
    }

    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.edit',compact('role','permissions','permission_groups'));

    }
}
