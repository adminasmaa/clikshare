<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:View Role', ['only' => ['index']]);
        $this->middleware('permission:Add Role', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Role', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        $role = Role::create([
                        'name' => $request->input('name'),
                        'name_ar' => $request->input('name_ar'),
                        'description_en' => $request->input('description_en'),
                        'description_ar' => $request->input('description_ar'),
                        'user_type' => $request->input('user_type'),
                        'status' => $request->input('status')
                    ]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')->with('success',Lang::get('admin.Role created successfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin.roles.show',compact('role','permission','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin.roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->name_ar = $request->input('name_ar');
        $role->description_en = $request->input('description_en');
        $role->description_ar = $request->input('description_ar');
        $role->user_type = $request->input('user_type');
        $role->status = $request->input('status');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index')->with('success',Lang::get('admin.Role created successfully'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.roles.index')->with('success',Lang::get('admin.Role created successfully'));
    }
}
