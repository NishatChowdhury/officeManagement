<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::query()->paginate(10);
        return view('admin.office-setup.shift.index',compact('shifts'));
    }

    public function create()
    {
        return view('admin.office-setup.shift.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'in' => 'required',
            'out' => 'required',
            'grace' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Shift::query()->create($request->all());
        return redirect('admin/shift')->with('status', 'Shift added Successfully!');
    }

    public function edit($id)
    {
        $shift= Shift::query()->findOrFail($id);
        return view('admin.office-setup.shift.edit',compact('shift'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'in' => 'required',
            'out' => 'required',
            'grace' => 'required',
            'description' => 'required'
        ]);
        $shift = Shift::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $shift->update($request->all());
        return redirect('admin/shift')->with('status', 'Shift Updated Successfully!');
    }

    public function destroy($id)
    {
        $shift = Shift::query()->findOrFail($id);
        $shift->delete();
        return redirect('admin/shift')->with('status', 'Shift Deleted Successfully!');
    }
}
