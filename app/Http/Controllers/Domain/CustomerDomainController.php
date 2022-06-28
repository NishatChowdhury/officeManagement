<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain\Customer;
use App\Models\Domain\CustomerDomain;
use App\Models\Domain\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class CustomerDomainController extends Controller
{
    public function index()
    {
        $customerDomain = CustomerDomain::query()->paginate(10);
        return view('admin.domain-hosting.customerDomain.index',compact('customerDomain'));
    }

    public function create()
    {
        $customers = Customer::query()->pluck('name','id');
        $domains = Domain::query()->pluck('name','id');
        return view('admin.domain-hosting.customerDomain.add',compact('customers','domains'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'domain_id' => 'required',
            'customer_id' => 'required',
            'registration_date' => 'required',
            'expire_date' => 'required',
            'amount' => 'required',
            'is_active' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        CustomerDomain::query()->create($request->all());
        return redirect('admin/customer-domain')->with('status', 'Customer Domain added!');
    }

    public function edit($id)
    {
        $customerDomain = CustomerDomain::query()->findOrFail($id);
        $customers = Customer::query()->pluck('name','id');
        $domains = Domain::query()->pluck('name','id');
        return view('admin.domain-hosting.customerDomain.edit',compact('domains','customers','customerDomain'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'domain_id' => 'required',
            'customer_id' => 'required',
            'registration_date' => 'required',
            'expire_date' => 'required',
            'amount' => 'required',
            'is_active' => 'required'
        ]);
        $customerDomain = CustomerDomain::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $customerDomain->update($request->all());
        return redirect('admin/customer-domain')->with('status', 'Customer Domain Updated!');
    }

    public function destroy($id)
    {
        $customerDomain = CustomerDomain::query()->findOrFail($id);
        $customerDomain->delete();
        return redirect('admin/customer-domain')->with('status', 'Customer Domain Deleted!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $customerDomain = CustomerDomain::query()->findOrFail($id);
        if($customerDomain->is_active == 1)
        {
            $customerDomain->is_active = 0;
        }
        else
        {
            $customerDomain->is_active = 1;
        }
        $customerDomain->save();

        return redirect('admin/customer-domain')->with('success','Status Change Successfully');
    }
}
