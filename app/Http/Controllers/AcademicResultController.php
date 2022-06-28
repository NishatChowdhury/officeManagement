<?php

namespace App\Http\Controllers;

use App\Models\AcademicResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcademicResultController extends Controller
{
    public function index()
    {
        $academicResult= AcademicResult::query()->paginate(10);
        return view('admin.employee-management.academicResult.index',compact('academicResult'));
    }

    public function create()
    {
        return view('admin.employee-management.academicResult.add');
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

        AcademicResult::query()->create($request->all());
        return redirect('admin/academic-result')->with('status', 'Academic result added Successfully!');
    }

    public function edit($id)
    {
        $academicResult = AcademicResult::query()->findOrFail($id);
        return view('admin.employee-management.academicResult.edit',compact('academicResult'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_active' => 'required'
        ]);
        $result = AcademicResult::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $result->update($request->all());
        return redirect('admin/academic-result')->with('status', 'Result Updated Successfully!');
    }

    public function destroy($id)
    {
        $result = AcademicResult::query()->findOrFail($id);
        $result->delete();
        return redirect('admin/academic-result')->with('status', 'Result Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $result = AcademicResult::query()->findOrFail($id);
        if($result->is_active == 1)
        {
            $result->is_active = 0;
        }else{
            $result->is_active = 1;
        }
        $result->save();

        return redirect('admin/academic-result')->with('success','Status Change Successfully');
    }
}
