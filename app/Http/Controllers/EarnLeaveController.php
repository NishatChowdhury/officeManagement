<?php

namespace App\Http\Controllers;

use App\Models\EarnLeave;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EarnLeaveController extends Controller
{
    public function index()
    {
        $earnLeaves = EarnLeave::query()->paginate(10);
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.leave-management.earnLeave.index',compact('earnLeaves','employee'));
    }

    public function create()
    {
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.leave-management.earnLeave.add',compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'date' => 'required',
            'balance' => 'required',
            'previous_balance' => 'required',
            'next_schedule' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        EarnLeave::query()->create($request->all());
        return redirect('admin/earn-leave')->with('status', 'Earn Leave added Successfully!');
    }

    public function edit($id)
    {
        $earnLeaves= EarnLeave::query()->findOrFail($id);
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.leave-management.earnLeave.edit',compact('earnLeaves','employee'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'date' => 'required',
            'balance' => 'required',
            'previous_balance' => 'required',
            'next_schedule' => 'required'
        ]);
        $earnLeave= EarnLeave::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $earnLeave->update($request->all());
        return redirect('admin/earn-leave')->with('status', 'Earn Leave Updated Successfully!');
    }

    public function destroy($id)
    {
        $earnLeave= EarnLeave::query()->findOrFail($id);
        $earnLeave->delete();
        return redirect('admin/earn-leave')->with('status', 'Earn Leave Deleted Successfully!');
    }
}
