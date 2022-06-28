<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Employee;
use App\Models\WeeklyOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeeklyOffController extends Controller
{
    public function index()
    {
        $weeklyOff = WeeklyOff::query()->paginate(10);
        return view('admin.weeklyOff.index',compact('weeklyOff'));
    }

    public function create()
    {
        $employees = Employee::query()->pluck('employee_no','id');
        $days = Day::query()->pluck('name','id');
        return view('admin.weeklyOff.add',compact('employees','days'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'day_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        WeeklyOff::query()->create($request->all());
        return redirect('admin/weekly-off')->with('status', 'Weekly Off added!');
    }

    public function edit($id)
    {
        $weeklyOff = WeeklyOff::query()->findOrFail($id);
        $employees = Employee::query()->pluck('employee_no','id');
        $days = Day::query()->pluck('name','id');
        return view('admin.weeklyOff.edit',compact('weeklyOff','employees','days'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'day_id' => 'required'
        ]);
        $weeklyOff = WeeklyOff::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $weeklyOff->update($request->all());
        return redirect('admin/weekly-off')->with('status', 'Weekly Off Updated!');
    }

    public function destroy($id)
    {
        $weeklyOff= WeeklyOff::query()->findOrFail($id);
        $weeklyOff->delete();
        return redirect('admin/weekly-off')->with('status', 'Weekly Off Deleted!');
    }
}
