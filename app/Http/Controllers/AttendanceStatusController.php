<?php

namespace App\Http\Controllers;

use App\Models\AttendanceStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceStatusController extends Controller
{
    public function index()
    {
        $status = AttendanceStatus::query()->paginate(10);
        return view('admin.attendance-management.attendanceStatus.index',compact('status'));
    }

    public function create()
    {
        return view('admin.attendance-management.attendanceStatus.add');
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

        AttendanceStatus::query()->create($request->all());
        return redirect('admin/attendance-status')->with('status', 'Status added Successfully!');
    }

    public function edit($id)
    {
        $status = AttendanceStatus::query()->findOrFail($id);
        return view('admin.attendance-management.attendanceStatus.edit',compact('status'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required'
        ]);
        $status = AttendanceStatus::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $status->update($request->all());
        return redirect('admin/attendance-status')->with('status', 'Status Updated Successfully!');
    }

    public function destroy($id)
    {
        $status = AttendanceStatus::query()->findOrFail($id);
        $status->delete();
        return redirect('admin/attendance-status')->with('status', 'Status Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $status = AttendanceStatus::query()->findOrFail($id);
        if($status->is_active == 1)
        {
            $status->is_active = 0;
        }else{
            $status->is_active = 1;
        }
        $status->save();

        return redirect('admin/attendance-status')->with('success','Status Changed Successfully');
    }
}
