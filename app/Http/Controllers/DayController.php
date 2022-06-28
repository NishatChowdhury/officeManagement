<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::query()->paginate(10);
        return view('admin.leave-management.day.index',compact('days'));
    }

    public function create()
    {
        return view('admin.leave-management.day.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Day::query()->create($request->all());
        return redirect('admin/day')->with('status', 'Day added Successfully!');
    }

    public function edit($id)
    {
        $day = Day::query()->findOrFail($id);
        return view('admin.leave-management.day.edit',compact('day'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $day= Day::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $day->update($request->all());
        return redirect('admin/day')->with('status', 'Day Updated Successfully!');
    }

    public function destroy($id)
    {
        $day = Day::query()->findOrFail($id);
        $day->delete();
        return redirect('admin/day')->with('status', 'Day Deleted Successfully!');
    }

}
