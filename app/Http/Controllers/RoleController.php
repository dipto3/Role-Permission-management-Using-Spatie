<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RoleController extends Controller
{

    public $user;

    public function __construct(){

        $this->middleware(function($request , $next){
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    public function index(){




        if(is_null($this->user) || !$this->user->can('role.view')){
            abort(403,'Unauthorized Access!');
        }
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
       return "Marakha";
        if(is_null($this->user) || !$this->user->can('role.edit')){
            abort(403,'Unauthorized Access!');
        }
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.edit',compact('role','permissions','permission_groups'));

    }

    public function update(Request $request,$id){


        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

       $permissions = $request->input('permissions');

       if (!empty($permissions)) {
           $role->syncPermissions($permissions);
       }
        return redirect()->back();
    }

    public function destroy($id){

        if(is_null($this->user) || !$this->user->can('role.delete')){
            abort(403,'Unauthorized Access!');
        }
        $role = Role::find($id);
        $role->delete();
        return redirect()->back();
    }



}
