<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function index()
    {
        $education= Education::query()->paginate(10);
        return view('admin.employee-management.education.index',compact('education'));
    }

    public function create()
    {
        return view('admin.employee-management.education.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Education::query()->create($request->all());
        return redirect('admin/education')->with('status', 'Education added Successfully!');
    }

    public function edit($id)
    {
        $education = Education::query()->findOrFail($id);
        return view('admin.employee-management.education.edit',compact('education'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required'
        ]);
        $education = Education::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $education->update($request->all());
        return redirect('admin/education')->with('status', 'Education Updated Successfully!');
    }

    public function destroy($id)
    {
        $education = Education::query()->findOrFail($id);
        $education->delete();
        return redirect('admin/education')->with('status', 'Education Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $education = Education::query()->findOrFail($id);
        if($education->is_active == 1)
        {
            $education->is_active = 0;
        }else{
            $education->is_active = 1;
        }
        $education->save();

        return redirect('admin/education')->with('success','Status Change Successfully');
    }
}
