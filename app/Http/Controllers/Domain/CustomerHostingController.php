<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain\Customer;
use App\Models\Domain\CustomerHosting;
use App\Models\Hosting;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class CustomerHostingController extends Controller
{
    public function index()
    {
        $customerHosting = CustomerHosting::query()->paginate(10);
        return view('admin.domain-hosting.customerHosting.index',compact('customerHosting'));
    }

    public function create()
    {
        $providers = Provider::query()->pluck('name','id');
        $customers = Customer::query()->pluck('name','id');
        $hostings = Hosting::query()->pluck('name','id');
        return view('admin.domain-hosting.customerHosting.add',compact('providers','customers','hostings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'hosting_id' => 'required',
            'customer_id' => 'required',
            'provider_id' => 'required',
            'registration_date' => 'required',
            'expire_date' => 'required',
            'amount' => 'required',
            'is_active' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        CustomerHosting::query()->create($request->all());
        return redirect('admin/customer-hosting')->with('status', 'Customer Hosting added!');
    }

    public function edit($id)
    {
        $customerHosting = CustomerHosting::query()->findOrFail($id);
        $providers = Provider::query()->pluck('name','id');
        $customers = Customer::query()->pluck('name','id');
        $hostings = Hosting::query()->pluck('name','id');
        return view('admin.domain-hosting.customerHosting.edit',compact('hostings','providers','customers','customerHosting'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'hosting_id' => 'required',
            'customer_id' => 'required',
            'provider_id' => 'required',
            'registration_date' => 'required',
            'expire_date' => 'required',
            'amount' => 'required',
        ]);
        $customerHosting = CustomerHosting::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $customerHosting->update($request->all());
        return redirect('admin/customer-hosting')->with('status', 'Customer Hosting Updated!');
    }

    public function destroy($id)
    {
        $customerHosting = CustomerHosting::query()->findOrFail($id);
        $customerHosting->delete();
        return redirect('admin/customer-hosting')->with('status', 'Customer Hosting Deleted!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $customerHosting = CustomerHosting::query()->findOrFail($id);
        if($customerHosting->is_active == 1)
        {
            $customerHosting->is_active = 0;
        }else{
            $customerHosting->is_active = 1;
        }
        $customerHosting->save();

        return redirect('admin/customer-hosting')->with('success','Status Change Successfully');
    }
}
