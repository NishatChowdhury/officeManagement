<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HostingController extends Controller
{
    public function index()
    {
        $hosting = Hosting::query()->paginate(10);
        return view('admin.domain-hosting.hosting.index',compact('hosting'));
    }

    public function create()
    {
        $providers = Provider::query()->pluck('name','id');
        return view('admin.domain-hosting.hosting.add-hosting',compact('providers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'provider_id' => 'required',
            'package' => 'required',
            'amount' => 'required',
            'registration_date' => 'required',
            'expire_date' => 'required',
            'note' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Hosting::query()->create($request->all());
        return redirect('admin/hosting')->with('status', 'Hosting added!');
    }

    public function edit($id)
    {
        $providers = Provider::query()->pluck('name','id');
        $hosting = Hosting::query()->findOrFail($id);
        return view('admin.domain-hosting.hosting.edit',compact('hosting','providers'));
    }

    public function update($id, Request $request)
    {
        $hosting = Hosting::query()->findOrFail($id);
        $hosting->update($request->all());
        return redirect('admin/hosting')->with('status', 'Hosting Updated!');
    }

    public function destroy($id)
    {
        $hosting = Hosting::query()->findOrFail($id);
        $hosting->delete();
        return redirect('admin/hosting')->with('status', 'Hosting Deleted!');
    }
}
