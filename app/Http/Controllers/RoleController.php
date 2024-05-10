<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $q =  $request->input('q');
        if($q!=""){
            $roles = Role::where('name','LIKE','%'.$q.'%')
                        ->orderBy('id','ASC')
                        ->paginate(5);
        } else {
            $roles = Role::orderBy('id','ASC')->paginate(5);
        }
        
        $permission = Permission::get();
        return view('admin.roles.index',compact('roles', 'permission'));
    }

    // public function create()
    // {
    //     $permission = Permission::get();
    //     return view('admin.roles.create',compact('permission'));
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        if ($role) {
            return response()->json(['data' => $role, 'error' => true, 'msg' => "Role created successfully"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Role could not be saved. Please, try again."], 200);

        // return redirect()->route('roles.index')
        //                 ->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('admin.roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {

        // $role = DB::table("roles")->where('id',$id)->delete();
        $role = 0;
        if ($role) {
            return response()->json(['data' => $role, 'error' => true, 'msg' => "Role deleted successfully"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Role could not be deleted. Please, try again."], 200);
    }
}
