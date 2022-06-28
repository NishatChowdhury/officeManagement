<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Database\Query\Builder;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles=Role::all();
        $permissions = Permission::query()->pluck('name','id');
        return view('admin.user-management.role.index',compact('roles','permissions'));
    }

    public function store(Request $request)
    {
       // dd($request->all());

        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role->permissions()->attach($request->permission_id);
        session()->flash('success','Role and Permission has been added Successfully');
        return redirect()->route('role');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.user-management.role.update',compact('role'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request,[
            'name'=>'required|unique:roles',
        ]);

        $list = Role::query()->findOrFail($id);
        $list= $request->name;
        $list->update();
        return redirect()->route('role')->with('message', 'Role has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id):\Illuminate\Http\RedirectResponse
    {
        $del=Role::query()->findOrFail($id);
        $del->delete();
        return redirect()->route('role')->with('message', 'Role has been deleted!');
    }
}
