<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenderController extends Controller
{
    public function index()
    {
        $gender = Gender::query()->paginate(10);
        return view('admin.employee-management.gender.index',compact('gender'));
    }

    public function create()
    {
        return view('admin.employee-management.gender.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Gender::query()->create($request->all());
        return redirect('admin/gender')->with('status', 'Gender added Successfully!');
    }

    public function edit($id)
    {
        $gender = Gender::query()->findOrFail($id);
        return view('admin.employee-management.gender.edit',compact('gender'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required'
        ]);
        $gender = Gender::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $gender->update($request->all());
        return redirect('admin/gender')->with('status', 'Gender Updated Successfully!');
    }

    public function destroy($id)
    {
        $gender = Gender::query()->findOrFail($id);
        $gender->delete();
        return redirect('admin/gender')->with('status', 'Gender Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $gender = Gender::query()->findOrFail($id);
        if($gender->is_active == 1)
        {
            $gender->is_active = 0;
        }else{
            $gender->is_active = 1;
        }
        $gender->save();

        return redirect('admin/gender')->with('success','Status Change Successfully');
    }
}
