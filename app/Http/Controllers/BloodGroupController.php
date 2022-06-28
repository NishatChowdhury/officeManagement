<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloodGroupController extends Controller
{
    public function index()
    {
        $bloodGroups = BloodGroup::query()->paginate(10);
        return view('admin.employee-management.bloodGroup.index',compact('bloodGroups'));
    }

    public function create()
    {
        return view('admin.employee-management.bloodGroup.add');
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

        BloodGroup::query()->create($request->all());
        return redirect('admin/blood-group')->with('status', 'Blood Group added Successfully!');
    }

    public function edit($id)
    {
        $bloodGroup= BloodGroup::query()->findOrFail($id);
        return view('admin.employee-management.bloodGroup.edit',compact('bloodGroup'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $bloodGroup = BloodGroup::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $bloodGroup->update($request->all());
        return redirect('admin/blood-group')->with('status', 'Blood Group Updated Successfully!');
    }

    public function destroy($id)
    {
        $bloodGroup = BloodGroup::query()->findOrFail($id);
        $bloodGroup->delete();
        return redirect('admin/blood-group')->with('status', 'Blood Group Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $bloodGroup = BloodGroup::query()->findOrFail($id);
        if($bloodGroup->is_active == 1)
        {
            $bloodGroup->is_active = 0;
        }else{
            $bloodGroup->is_active = 1;
        }
        $bloodGroup->save();

        return redirect('admin/blood-group')->with('success','Status Change Successfully');
    }
}
