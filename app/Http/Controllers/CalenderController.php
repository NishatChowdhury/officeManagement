<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalenderController extends Controller
{
    public function index()
    {
        $calendar = Calender::query()->paginate(10);
        return view('admin.office-setup.calendar.index',compact('calendar'));
    }

    public function create()
    {
        return view('admin.office-setup.calendar.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Calender::query()->create($request->all());
        return redirect('admin/calendar')->with('status', 'Designation added Successfully!');
    }

    public function edit($id)
    {
        $calendar= Calender::query()->findOrFail($id);
        return view('admin.office-setup.calendar.edit',compact('calendar'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);
        $calendar = Calender::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $calendar->update($request->all());
        return redirect('admin/calendar')->with('status', 'Calendar Updated Successfully!');
    }

    public function destroy($id)
    {
        $calendar = Calender::query()->findOrFail($id);
        $calendar->delete();
        return redirect('admin/calendar')->with('status', 'Calendar Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $calendar = Calender::query()->findOrFail($id);
        if($calendar->status == 1)
        {
            $calendar->status = 0;
        }else{
            $calendar->status = 1;
        }
        $calendar->save();

        return redirect('admin/calendar')->with('success','Status Changed Successfully');
    }
}
