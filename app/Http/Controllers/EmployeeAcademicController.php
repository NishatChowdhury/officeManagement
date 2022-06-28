<?php

namespace App\Http\Controllers;

use App\Models\AcademicResult;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeAcademic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeAcademicController extends Controller
{
    public function index()
    {
        $academics= EmployeeAcademic::query()->paginate(10);
        return view('admin.employeeAcademic.index',compact('academics'));
    }

    public function create()
    {
        $employee = Employee::query()->pluck('employee_no','id');
        $education= Education::query()->pluck('name','id');
        $academicResult = AcademicResult::query()->pluck('name','id');
        return view('admin.employeeAcademic.add',compact('employee','education','academicResult'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'education_id' => 'required',
            'degree_id' => 'required',
            'major' => 'required',
            'institute' => 'required',
            'result_id' => 'required',
            'marks' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'achievement' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        EmployeeAcademic::query()->create($request->all());
        return redirect('admin/employee-academic')->with('status', 'Employee Academic added Successfully!');
    }

    public function edit($id)
    {
        $employeeAcademic= EmployeeAcademic::query()->findOrFail($id);
        $employee = Employee::query()->pluck('employee_no','id');
        $education= Education::query()->pluck('name','id');
        $academicResult = AcademicResult::query()->pluck('name','id');
        return view('admin.employeeAcademic.edit',compact('employeeAcademic','employee','education','academicResult'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'education_id' => 'required',
            'degree_id' => 'required',
            'major' => 'required',
            'institute' => 'required',
            'result_id' => 'required',
            'marks' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'achievement' => 'required'
        ]);
        $employeeAcademic= EmployeeAcademic::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $employeeAcademic->update($request->all());
        return redirect('admin/employee-academic')->with('status', 'Employee Academic Updated Successfully!');
    }

    public function destroy($id)
    {
        $employeeAcademic = EmployeeAcademic::query()->findOrFail($id);
        $employeeAcademic->delete();
        return redirect('admin/employee-academic')->with('status', 'Employee Academic Deleted Successfully!');
    }
}
