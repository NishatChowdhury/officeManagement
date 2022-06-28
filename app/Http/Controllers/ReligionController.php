<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReligionController extends Controller
{
    public function index()
    {
        $religion = Religion::query()->paginate(10);
        return view('admin.employee-management.religion.index',compact('religion'));
    }

    public function create()
    {
        return view('admin.employee-management.religion.add');
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

        Religion::query()->create($request->all());
        return redirect('admin/religion')->with('status', 'Religion added Successfully!');
    }

    public function edit($id)
    {
        $religion = Religion::query()->findOrFail($id);
        return view('admin.employee-management.religion.edit',compact('religion'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        $religion = Religion::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $religion->update($request->all());
        return redirect('admin/religion')->with('status', 'Religion Updated Successfully!');
    }

    public function destroy($id)
    {
        $religion = Religion::query()->findOrFail($id);
        $religion->delete();
        return redirect('admin/religion')->with('status', 'Religion Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $religion = Religion::query()->findOrFail($id);
        if($religion->is_active == 1)
        {
            $religion->is_active = 0;
        }else{
            $religion->is_active = 1;
        }
        $religion->save();

        return redirect('admin/religion')->with('success','Status Change Successfully');
    }
}
