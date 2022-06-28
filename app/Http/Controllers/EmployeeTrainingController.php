<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Employee;
use App\Models\EmployeeTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeTrainingController extends Controller
{
    public function index()
    {
        $employeeTraining = EmployeeTraining::query()->paginate(10);
        return view('admin.employeeTraining.index',compact('employeeTraining'));
    }

    public function create()
    {
        $employees = Employee::query()->pluck('employee_no','id');
        $countries = Country::query()->pluck('name','id');
        return view('admin.employeeTraining.add',compact('countries','employees'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'training_title' => 'required',
            'topics_covered' => 'required',
            'training_institute' => 'required',
            'training_year' => 'required',
            'training_duration' => 'required',
            'training_location' => 'required',
            'training_country_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        EmployeeTraining::query()->create($request->all());
        return redirect('admin/employee-training')->with('status', 'Training added Successfully!');
    }

    public function edit($id)
    {
        $employeeTraining= EmployeeTraining::query()->findOrFail($id);
        $employees = Employee::query()->pluck('employee_no','id');
        $countries = Country::query()->pluck('name','id');
        return view('admin.employeeTraining.edit',compact('employeeTraining','employees','countries'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'training_title' => 'required',
            'topics_covered' => 'required',
            'training_institute' => 'required',
            'training_year' => 'required',
            'training_duration' => 'required',
            'training_location' => 'required',
            'training_country_id' => 'required'
        ]);
        $employeeTraining = EmployeeTraining::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $employeeTraining->update($request->all());
        return redirect('admin/employee-training')->with('status', 'Training Updated Successfully!');
    }

    public function destroy($id)
    {
        $employeeTraining = EmployeeTraining::query()->findOrFail($id);
        $employeeTraining->delete();
        return redirect('admin/employee-training')->with('status', 'Training Deleted Successfully!');
    }
}
