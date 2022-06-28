<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeExperienceController extends Controller
{
    public function index()
    {
        $experience = EmployeeExperience::query()->paginate(10);
        return view('admin.employeeExperience.index',compact('experience'));
    }

    public function create()
    {
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.employeeExperience.add',compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'company' => 'required',
            'business' => 'required',
            'designation' => 'required',
            'area_of_experience' => 'required',
            'experience_location' => 'required',
            'experience_start' => 'required',
            'experience_end' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        EmployeeExperience::query()->create($request->all());
        return redirect('admin/employee-experience')->with('status', 'Experience added Successfully!');
    }

    public function edit($id)
    {
        $experience = EmployeeExperience::query()->findOrFail($id);
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.employeeExperience.edit',compact('experience','employee'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'company' => 'required',
            'business' => 'required',
            'designation' => 'required',
            'area_of_experience' => 'required',
            'experience_location' => 'required',
            'experience_start' => 'required',
            'experience_end' => 'required'
        ]);
        $experience = EmployeeExperience::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $experience->update($request->all());
        return redirect('admin/employee-experience')->with('status', 'Experience Updated!');
    }

    public function destroy($id)
    {
        $experience = EmployeeExperience::query()->findOrFail($id);
        $experience->delete();
        return redirect('admin/employee-experience')->with('status', 'Experience Deleted!');
    }
}
