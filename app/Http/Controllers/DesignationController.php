<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function index()
    {
        $designation= Designation::query()->paginate(10);
        return view('admin.office-setup.designation.index',compact('designation'));
    }

    public function create()
    {
        return view('admin.office-setup.designation.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'display_name' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Designation::query()->create($request->all());
        return redirect('admin/designation')->with('status', 'Designation added Successfully!');
    }

    public function edit($id)
    {
        $designation= Designation::query()->findOrFail($id);
        return view('admin.office-setup.designation.edit',compact('designation'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'display_name' => 'required',
        ]);
        $designation = Designation::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $designation->update($request->all());
        return redirect('admin/designation')->with('status', 'Designation Updated Successfully!');
    }

    public function destroy($id)
    {
        $designation = Designation::query()->findOrFail($id);
        $designation->delete();
        return redirect('admin/designation')->with('status', 'Designation Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $designation = Designation::query()->findOrFail($id);
        if($designation->is_active == 1)
        {
            $designation->is_active = 0;
        }else{
            $designation->is_active = 1;
        }
        $designation->save();

        return redirect('admin/designation')->with('success','Status Changed Successfully');
    }
}
