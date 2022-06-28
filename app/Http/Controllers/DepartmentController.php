<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::query()->paginate(10);
        return view('admin.office-setup.department.index',compact('departments'));
    }

    public function create()
    {
        return view('admin.office-setup.department.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Department::query()->create($request->all());
        return redirect('admin/department')->with('status', 'Department added Successfully!');
    }

    public function edit($id)
    {
        $department = Department::query()->findOrFail($id);
        return view('admin.office-setup.department.edit',compact('department'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $department = Department::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $department->update($request->all());
        return redirect('admin/department')->with('status', 'Department Updated Successfully!');
    }

    public function destroy($id)
    {
        $department = Department::query()->findOrFail($id);
        $department->delete();
        return redirect('admin/department')->with('status', 'Department Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $department = Department::query()->findOrFail($id);
        if($department->is_active == 1)
        {
            $department->is_active = 0;
        }else{
            $department->is_active = 1;
        }
        $department->save();

        return redirect('admin/department')->with('success','Status Change Successfully');
    }
}
