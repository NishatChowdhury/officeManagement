<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveCategoryController extends Controller
{
    public function index()
    {
        $leaveCategories= LeaveCategory::query()->paginate(10);
        return view('admin.leave-management.leaveCategory.index',compact('leaveCategories'));
    }

    public function create()
    {
        return view('admin.leave-management.leaveCategory.add');
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

        LeaveCategory::query()->create($request->all());
        return redirect('admin/leave-category')->with('status', 'Leave Category added Successfully!');
    }

    public function edit($id)
    {
        $leaveCategory = LeaveCategory::query()->findOrFail($id);
        return view('admin.leave-management.leaveCategory.edit',compact('leaveCategory'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $leaveCategory = LeaveCategory::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $leaveCategory->update($request->all());
        return redirect('admin/leave-category')->with('status', 'Leave Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $leaveCategory = LeaveCategory::query()->findOrFail($id);
        $leaveCategory->delete();
        return redirect('admin/leave-category')->with('status', 'Leave Category Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $leaveCategory = LeaveCategory::query()->findOrFail($id);
        if($leaveCategory->is_active == 1)
        {
            $leaveCategory->is_active = 0;
        }else{
            $leaveCategory->is_active = 1;
        }
        $leaveCategory->save();

        return redirect('admin/leave-category')->with('success','Status Change Successfully');
    }
}
