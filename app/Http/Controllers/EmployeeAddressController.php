<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeAddressController extends Controller
{
    public function index()
    {
        $employeeAddress = EmployeeAddress::query()->paginate(10);
        return view('admin.employeeAddress.index',compact('employeeAddress'));
    }

    public function create()
    {
        $employees = Employee::query()->pluck('employee_no','id');
        $countries = Country::query()->pluck('name','id');
        return view('admin.employeeAddress.add',compact('countries','employees'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'pr_address_line_one' => 'required',
            'pr_address_line_two' => 'required',
            'pr_phone_one' => 'required',
            'pr_phone_two' => 'required',
            'pr_email' => 'required',
            'pr_village' => 'required',
            'pr_police_station' => 'required',
            'pr_post_office' => 'required',
            'pr_city_id' => 'required',
            'pr_country_id' => 'required',
            'pa_address_line_one' => 'required',
            'pa_address_line_two' => 'required',
            'pa_phone_one' => 'required',
            'pa_phone_two' => 'required',
            'pa_email' => 'required',
            'pa_village' => 'required',
            'pa_police_station' => 'required',
            'pa_post_office' => 'required',
            'pa_city_id' => 'required',
            'pa_country_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        EmployeeAddress::query()->create($request->all());
        return redirect('admin/employee-address')->with('status', 'Address added Successfully!');
    }

    public function edit($id)
    {
        $employeeAddress= EmployeeAddress::query()->findOrFail($id);
        $employees = Employee::query()->pluck('employee_no','id');
        $countries = Country::query()->pluck('name','id');
        return view('admin.employeeAddress.edit',compact('employeeAddress','employees','countries'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'pr_address_line_one' => 'required',
            'pr_address_line_two' => 'required',
            'pr_phone_one' => 'required',
            'pr_phone_two' => 'required',
            'pr_email' => 'required',
            'pr_village' => 'required',
            'pr_police_station' => 'required',
            'pr_post_office' => 'required',
            'pr_city_id' => 'required',
            'pr_country_id' => 'required',
            'pa_address_line_one' => 'required',
            'pa_address_line_two' => 'required',
            'pa_phone_one' => 'required',
            'pa_phone_two' => 'required',
            'pa_email' => 'required',
            'pa_village' => 'required',
            'pa_police_station' => 'required',
            'pa_post_office' => 'required',
            'pa_city_id' => 'required',
            'pa_country_id' => 'required'
        ]);
        $employeeAddress = EmployeeAddress::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $employeeAddress->update($request->all());
        return redirect('admin/employee-address')->with('status', 'Address Updated Successfully!');
    }

    public function destroy($id)
    {
        $employeeAddress= EmployeeAddress::query()->findOrFail($id);
        $employeeAddress->delete();
        return redirect('admin/employee-address')->with('status', 'Address Deleted Successfully!');
    }
}
