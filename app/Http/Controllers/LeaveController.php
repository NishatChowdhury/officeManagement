<?php

namespace App\Http\Controllers;

use App\Models\EarnLeave;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::query()->paginate(10);
        $employee = Employee::query()->pluck('employee_no','id');
        $leaveCategories = LeaveCategory::query()->pluck('name','id');
        return view('admin.leave-management.leave.index',compact('leaves','leaveCategories','employee'));
    }

    public function create()
    {
        $employee = Employee::query()->pluck('employee_no','id');
        $leaveCategories = LeaveCategory::query()->pluck('name','id');
        $users=User::pluck('name','id');
        return view('admin.leave-management.leave.add',compact('employee','leaveCategories','users'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'employee_id'       => ['required','integer'],
            'leave_category_id' => ['required','integer'],
            'leave_from'        => ['required','date'],
            'leave_to'          => ['required','date'],
            'approved_by'       => ['required','integer'],
        ]);
        $from= new Carbon($request->leave_from);
        $to= new Carbon($request->leave_to);
        $days= $from->diffInDays($to);
        $validated['days'] = $days;
        $validated['date'] = today();
        $leave=Leave::create($validated);


        if ($leave) {
            $earnLeave=EarnLeave::where('employee_id',$request->employee_id)->orderBy('id','Desc')->first();
            if ($earnLeave){
                $remaining= $earnLeave->balance-$days;
                $earnLeave->balance= $remaining;
                $earnLeave->update();
            }
        }
        return redirect('admin/leave')->with('status', 'Leave added Successfully!');
    }

    public function edit(Leave $leave)
    {
        $employees = Employee::pluck('name','id');
        $leaveCategories = LeaveCategory::pluck('name','id');
        $users = User::pluck('name','id');
        return view('admin.leave-management.leave.edit',compact('users','leave','employee','leaveCategories'));
    }

    public function update(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'employee_id'       => ['required','integer'],
            'leave_category_id' => ['required','integer'],
            'leave_from'        => ['required','date'],
            'leave_to'          => ['required','date'],
            'approved_by'       => ['required','integer'],
        ]);
        $from= new Carbon($request->leave_from);
        $to= new Carbon($request->leave_to);
        $days= $from->diffInDays($to);
        $validated['days'] = $days;
        $leave->update($validated);

        if ($leave) {
            $earnLeave=EarnLeave::where('employee_id',$request->employee_id)->orderBy('id','Desc')->first();
            if ($earnLeave){
                $remaining= $earnLeave->balance-$days;
                $earnLeave->balance= $remaining;
                $earnLeave->update();
            }
        }
        return redirect('admin/leave')->with('status', 'Leave Updated Successfully!');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect('admin/leave')->with('status', 'Leave Deleted Successfully!');
    }
}
