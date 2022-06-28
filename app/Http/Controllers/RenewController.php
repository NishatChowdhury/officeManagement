<?php

namespace App\Http\Controllers;

use App\Models\Renew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RenewController extends Controller
{
    public function index()
    {
        $renew = Renew::query()->paginate(10);
        return view('admin.domain-hosting.renew.index',compact('renew'));
    }

    public function create()
    {
        return view('admin.domain-hosting.renew.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'renewable_id' => 'required',
            'renewable_type' => 'required',
            'date' => 'required',
            'amount' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Renew::query()->create($request->all());
        return redirect('admin/renew')->with('status', 'Data added Successfully!');
    }

    public function edit($id)
    {
        $renew = Renew::query()->findOrFail($id);
        return view('admin.domain-hosting.renew.edit',compact('renew'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'renewable_id' => 'required',
            'renewable_type' => 'required',
            'date' => 'required',
            'amount' => 'required'
        ]);
        $renew = Renew::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $renew->update($request->all());
        return redirect('admin/renew')->with('status', 'Renew Updated Successfully!');
    }

    public function destroy($id)
    {
        $renew = Renew::query()->findOrFail($id);
        $renew->delete();
        return redirect('admin/renew')->with('status', 'Data Deleted Successfully!');
    }
}
