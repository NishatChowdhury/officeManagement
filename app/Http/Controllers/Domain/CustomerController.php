<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()->paginate(10);
        return view('admin.domain-hosting.customer.index',compact('customers'));
    }

    public function search(Request $request)
    {
        $customers = Customer::query()
            ->where('name','like','%'.$request->get('q').'%')
            ->paginate(10);

        return view('admin.domain-hosting.customer.searchCustomer',compact('customers'));
    }

    public function create()
    {
        return view('admin.domain-hosting.customer.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'contact_person' => 'required',
            'contact_person_phone' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Customer::query()->create($request->all());
        return redirect('admin/customer')->with('status', 'Customer added!');
    }

    public function edit($id)
    {
        $customer = Customer::query()->findOrFail($id);
        return view('admin.domain-hosting.customer.edit',compact('customer'));
    }

    public function update($id, Request $request)
    {
        $customer = Customer::query()->findOrFail($id);
        $customer->update($request->all());
        return redirect('admin/customer')->with('status', 'Customer Updated!');
    }

    public function destroy($id)
    {
        $customer = Customer::query()->findOrFail($id);
        $customer->delete();
        return redirect('admin/customer')->with('status', 'Customer Deleted!');
    }
}
