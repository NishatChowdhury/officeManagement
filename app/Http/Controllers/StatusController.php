<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        $status= Status::query()->paginate(10);
        return view('admin.office-setup.status.index',compact('status'));
    }

    public function create()
    {
        return view('admin.office-setup.status.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Status::query()->create($request->all());
        return redirect('admin/status')->with('status', 'Status added Successfully!');
    }

    public function edit($id)
    {
        $status = Status::query()->findOrFail($id);
        return view('admin.office-setup.status.edit',compact('status'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $status = Status::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $status->update($request->all());
        return redirect('admin/status')->with('status', 'Status Updated Successfully!');
    }

    public function destroy($id)
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();
        return redirect('admin/status')->with('status', 'Status Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $status = Status::query()->findOrFail($id);
        if($status->is_active == 1)
        {
            $status->is_active = 0;
        }else{
            $status->is_active = 1;
        }
        $status->save();

        return redirect('admin/status')->with('success','Status Change Successfully');
    }
}
