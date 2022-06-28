<?php

namespace App\Http\Controllers;

use App\Models\NameServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NameServerController extends Controller
{
    public function index()
    {
        $nameServer = NameServer::query()->paginate(10);
        return view('admin.domain-hosting.nameServer.index',compact('nameServer'));
    }

    public function create()
    {
        return view('admin.domain-hosting.nameServer.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'ip' => 'required',
            'is_active' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        NameServer::query()->create($request->all());
        return redirect('admin/name-server')->with('status', 'Name Server added Successfully!');
    }

    public function edit($id)
    {
        $nameServer= NameServer::query()->findOrFail($id);
        return view('admin.domain-hosting.nameServer.edit',compact('nameServer'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'ip' => 'required',
            'is_active' => 'required'
        ]);
        $nameServer = NameServer::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $nameServer->update($request->all());
        return redirect('admin/name-server')->with('status', 'Name Server Updated Successfully!');
    }

    public function destroy($id)
    {
        $nameServer = NameServer::query()->findOrFail($id);
        $nameServer->delete();
        return redirect('admin/name-server')->with('status', 'Name Server Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $nameServer = NameServer::query()->findOrFail($id);
        if($nameServer->is_active == 1)
        {
            $nameServer->is_active = 0;
        }else{
            $nameServer->is_active = 1;
        }
        $nameServer->save();

        return redirect('admin/name-server')->with('success','Status Changed Successfully');
    }
}
