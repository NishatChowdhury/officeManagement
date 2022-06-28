<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain\Domain;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::query()->latest()->paginate(10);
        return view('admin.domain-hosting.domain.index',compact('domains'));
    }

    public function create()
    {
        $providers = Provider::query()->pluck('name','id');
        return view('admin.domain-hosting.domain.create',compact('providers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'alias' => 'required',
            'type' => 'required',
            'provider_id' => 'required',
            'amount' => 'required',
            'registration_date' => 'required|date',
            'expire_date' => 'required|date',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Domain::query()->create($request->all());
        return redirect('admin/domain')->with('status', 'Domain added!');
    }

    public function edit($id)
    {
        $providers = Provider::query()->pluck('name','id');
        $domain = Domain::query()->findOrFail($id);
        return view('admin.domain-hosting.domain.edit',compact('domain','providers'));
    }

    public function update($id, Request $request)
    {
        $domain = Domain::query()->findOrFail($id);
        $domain->update($request->all());
        return redirect('admin/domain')->with('status', 'Domain Updated!');
    }

    public function destroy($id)
    {
        $domain = Domain::query()->findOrFail($id);
        $domain->delete();
        return redirect('admin/domain')->with('status', 'Domain Deleted!');
    }
}
