<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaritalStatusController extends Controller
{
    public function index()
    {
        $maritalStatus = MaritalStatus::query()->paginate(10);
        return view('admin.employee-management.maritalStatus.index',compact('maritalStatus'));
    }

    public function create()
    {
        return view('admin.employee-management.maritalStatus.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        MaritalStatus::query()->create($request->all());
        return redirect('admin/marital-status')->with('status', 'Marital Status added Successfully!');
    }

    public function edit($id)
    {
        $maritalStatus= MaritalStatus::query()->findOrFail($id);
        return view('admin.settings.maritalStatus.edit',compact('maritalStatus'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required',
        ]);
        $maritalStatus = MaritalStatus::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $maritalStatus->update($request->all());
        return redirect('admin/marital-status')->with('status', 'Marital Status Updated Successfully!');
    }

    public function destroy($id)
    {
        $maritalStatus = MaritalStatus::query()->findOrFail($id);
        $maritalStatus->delete();
        return redirect('admin/marital-status')->with('status', 'Marital Status Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $maritalStatus = MaritalStatus::query()->findOrFail($id);
        if($maritalStatus->is_active == 1)
        {
            $maritalStatus->is_active = 0;
        }else{
            $maritalStatus->is_active = 1;
        }
        $maritalStatus->save();

        return redirect('admin/marital-status')->with('success','Status Changed Successfully!');
    }
}
