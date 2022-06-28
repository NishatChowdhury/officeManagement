<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProviderController extends Controller
{

    public function index()
    {
        $providers = Provider::query()->paginate(10);
        return view('admin.domain-hosting.provider.index',compact('providers'));
    }

    public function create()
    {
        return view('admin.domain-hosting.provider.add-provider');
    }

    public function store(Request $request)
    {
        Provider::query()->create($request->all());
        return redirect('admin/provider')->with('status', 'Provider added!');
    }

    public function edit($id)
    {
        $provider = Provider::query()->findOrFail($id);
        return view('admin.domain-hosting.provider.edit',compact('provider'));
    }

    public function update($id, Request $request)
    {
        $provider = Provider::query()->findOrFail($id);
        $provider->update($request->all());
        return redirect('admin/provider')->with('status', 'Provider Updated!');
    }

    public function destroy($id)
    {
        $provider = Provider::query()->findOrFail($id);
        $provider->delete();
        return redirect('admin/provider')->with('status', 'Provider Deleted!');
    }
}
