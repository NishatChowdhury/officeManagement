<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProfessionalCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfessionalCertificateController extends Controller
{
    public function index()
    {
        $certificate = ProfessionalCertificate::query()->paginate(10);
        return view('admin.employee-management.certificate.index',compact('certificate'));
    }

    public function create()
    {
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.employee-management.certificate.add',compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'certification' => 'required',
            'certification_institute' => 'required',
            'certification_location' => 'required',
            'certification_start' => 'required',
            'certification_end' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        ProfessionalCertificate::query()->create($request->all());
        return redirect('admin/professional-certificate')->with('status', 'Certificate added Successfully!');
    }

    public function edit($id)
    {
        $certificate = ProfessionalCertificate::query()->findOrFail($id);
        $employee = Employee::query()->pluck('employee_no','id');
        return view('admin.employee-management.certificate.edit',compact('certificate','employee'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'certification' => 'required',
            'certification_institute' => 'required',
            'certification_location' => 'required',
            'certification_start' => 'required',
            'certification_end' => 'required'
        ]);
        $certificate = ProfessionalCertificate::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $certificate->update($request->all());
        return redirect('admin/professional-certificate')->with('status', 'Certificate Updated!');
    }

    public function destroy($id)
    {
        $certificate = ProfessionalCertificate::query()->findOrFail($id);
        $certificate->delete();
        return redirect('admin/professional-certificate')->with('status', 'Certificate Deleted!');
    }
}
