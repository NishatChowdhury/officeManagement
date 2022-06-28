<?php

namespace App\Http\Controllers;

use App\Models\AcademicResult;
use App\Models\BloodGroup;
use App\Models\CalendarEvent;
use App\Models\Calender;
use App\Models\Country;
use App\Models\Day;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeAcademic;
use App\Models\EmployeeAddress;
use App\Models\EmployeeExperience;
use App\Models\EmployeeOfficial;
use App\Models\EmployeeStatus;
use App\Models\EmployeeTraining;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\Shift;
use App\Models\Status;
use App\Models\WeeklyOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::query()->paginate(10);
        return view('admin.employee-management.index',compact('employees'));
    }

    public function create()
    {
        $days = Day::query()->pluck('name','id');
        $education= Education::query()->pluck('name','id');
        $academicResult = AcademicResult::query()->pluck('name','id');
        $countries = Country::query()->pluck('name','id');
        $gender = Gender::query()->pluck('name','id');
        $maritalStatus = MaritalStatus::query()->pluck('name','id');
        $bloodGroup = BloodGroup::query()->pluck('name','id');
        $religion = Religion::query()->pluck('name','id');
        $departments = Department::query()->pluck('name','id');
        $designations = Designation::query()->pluck('name','id');
        $shifts = Shift::query()->pluck('name','id');
        $calendars = Calender::query()->pluck('name','id');
        $status = Status::query()->pluck('name','id');
        return view('admin.employee-management.add',compact('gender','maritalStatus','bloodGroup',
            'religion','countries','education','academicResult','days',
            'departments','designations','shifts','calendars','status'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_no' => 'required',
            'name' => 'required',
            'bn_name' => 'required',
            'dob' => 'required',
            'marital_status_id' => 'required',
            'blood_group_id' => 'required',
            'nid' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->employee_no . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/assets/images/employees/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
            try {
                $employee = Employee::query()->create($data);
            } catch (\Exception $e) {
                dd($e);
            }
        }
        else{
            try{
                $employee = Employee::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }

        EmployeeOfficial::create([
            'employee_id'=>$employee->id,
            'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id,
            'shift_id'=>$request->shift_id,
            'calender_code_id'=>$request->calender_code_id,
            'joining_date'=>$request->joining_date,
            'gross'=>$request->gross
        ]);

        EmployeeAddress::create([
            'employee_id'=>$employee->id,
            'pr_address_line_one'=>$request->pr_address_line_one,
            'pr_address_line_two'=>$request->pr_address_line_two,
            'pr_phone_one'=>$request->pr_phone_one,
            'pr_phone_two'=>$request->pr_phone_two,
            'pr_email'=>$request->pr_email,
            'pr_village'=>$request->pr_village,
            'pr_police_station'=>$request->pr_police_station,
            'pr_post_office'=>$request->pr_post_office,
            'pr_city_id'=>$request->pr_city_id,
            'pr_country_id'=>$request->pr_country_id,
            'pa_address_line_one'=>$request->pa_address_line_one,
            'pa_address_line_two'=>$request->pa_address_line_two,
            'pa_phone_one'=>$request->pa_phone_one,
            'pa_phone_two'=>$request->pa_phone_two,
            'pa_email'=>$request->pa_email,
            'pa_village'=>$request->pa_village,
            'pa_police_station'=>$request->pa_police_station,
            'pa_post_office'=>$request->pa_post_office,
            'pa_city_id'=>$request->pa_city_id,
            'pa_country_id'=>$request->pa_country_id
        ]);

        EmployeeAcademic::create([
            'employee_id'=>$employee->id,
            'education_id'=>$request->education_id,
            'degree_id'=>$request->degree_id,
            'major'=>$request->major,
            'institute'=>$request->institute,
            'result_id'=>$request->result_id,
            'marks'=>$request->marks,
            'year'=>$request->year,
            'duration'=>$request->duration,
            'achievement'=>$request->achievement
        ]);

        EmployeeExperience::create([
            'employee_id'=>$employee->id,
            'company'=>$request->company,
            'business'=>$request->business,
            'designation'=>$request->designation,
            'area_of_experience'=>$request->area_of_experience,
            'experience_location'=>$request->experience_location,
            'experience_start'=>$request->experience_start,
            'experience_end'=>$request->experience_end
        ]);

        EmployeeStatus::create([
            'employee_id'=>$employee->id,
            'status_id'=>$request->status_id,
            'date'=>$request->date,
            'description'=>$request->description,
        ]);

        EmployeeTraining::create([
            'employee_id'=>$employee->id,
            'training_title'=>$request->training_title,
            'topics_covered'=>$request->topics_covered,
            'training_institute'=>$request->training_institute,
            'training_year'=>$request->training_year,
            'training_duration'=>$request->training_duration,
            'training_location'=>$request->training_location,
            'training_country_id'=>$request->training_country_id
        ]);

        $employee->days()->attach($request->day_id);


        return redirect('admin/employee')->with('status', 'Employee Information added Successfully!');
    }

    public function show($id)
    {
        $employee = Employee::query()->findOrFail($id);
        $employeeOfficial = EmployeeOfficial::query()->where('employee_id',$id)->get();
        $employeeAddress = EmployeeAddress::query()->where('employee_id',$id)->get();
        $employeeAcademic = EmployeeAcademic::query()->where('employee_id',$id)->get();
        $employeeExperience = EmployeeExperience::query()->where('employee_id',$id)->get();
        $employeeStatus = EmployeeStatus::query()->where('employee_id',$id)->get();
        $employeeTraining = EmployeeTraining::query()->where('employee_id',$id)->get();
        $employeeOff = WeeklyOff::query()->where('employee_id',$id)->get();
//        dd($employee);
        return view('admin.employee-management.employee',compact('employee','employeeOfficial',
            'employeeAddress','employeeAcademic','employeeExperience','employeeStatus',
            'employeeTraining','employeeOff'));
    }

    public function edit($id)
    {
        $employee = Employee::query()->findOrFail($id);
        $employeeOfficial = EmployeeOfficial::query()->where('employee_id',$id)->first();
        $employeeAddress = EmployeeAddress::query()->where('employee_id',$id)->first();
        $employeeAcademic = EmployeeAcademic::query()->where('employee_id',$id)->first();
        $employeeExperience = EmployeeExperience::query()->where('employee_id',$id)->first();
        $employeeStatus = EmployeeStatus::query()->where('employee_id',$id)->first();
        $employeeTraining = EmployeeTraining::query()->where('employee_id',$id)->first();
        $employeeOff = WeeklyOff::query()->where('employee_id',$id)->first();

        $gender = Gender::query()->pluck('name','id');
        $maritalStatus = MaritalStatus::query()->pluck('name','id');
        $bloodGroup = BloodGroup::query()->pluck('name','id');
        $religion = Religion::query()->pluck('name','id');
        $countries = Country::query()->pluck('name','id');
        $departments = Department::query()->pluck('name','id');
        $designations = Designation::query()->pluck('name','id');
        $shifts = Shift::query()->pluck('name','id');
        $calendars = Calender::query()->pluck('name','id');
        $status = Status::query()->pluck('name','id');
        $education= Education::query()->pluck('name','id');
        $academicResult = AcademicResult::query()->pluck('name','id');
        $days = Day::query()->pluck('name','id');

        return view('admin.employee-management.edit-employee',
            compact('employee','employeeOfficial',
            'employeeAddress','employeeAcademic','employeeExperience','employeeStatus',
            'employeeTraining','employeeOff','gender','maritalStatus','bloodGroup','religion',
                'countries','departments','designations','shifts','calendars',
                'status','education','academicResult','days'
        ));
    }

    public function update(Employee $employee , Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_no' => 'required',
            'name' => 'required',
            'bn_name' => 'required',
            'dob' => 'required',
            'marital_status_id' => 'required',
            'blood_group_id' => 'required',
            'nid' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if($request->hasFile('image') != ''){
            $path = public_path().'/assets/images/employees/';
            if($employee->image != ''  && $employee->image != null){
                $file_old = $path.$employee->image;
                unlink($file_old);
            }
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $data['image'] = $filename;
            $employee->update($data);
        }
        else
        {
            $employee->update($data);
        }

        EmployeeOfficial::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id,
            'shift_id'=>$request->shift_id,
            'calender_code_id'=>$request->calender_code_id,
            'joining_date'=>$request->joining_date,
            'gross'=>$request->gross
        ]);
        EmployeeAddress::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'pr_address_line_one'=>$request->pr_address_line_one,
            'pr_address_line_two'=>$request->pr_address_line_two,
            'pr_phone_one'=>$request->pr_phone_one,
            'pr_phone_two'=>$request->pr_phone_two,
            'pr_email'=>$request->pr_email,
            'pr_village'=>$request->pr_village,
            'pr_police_station'=>$request->pr_police_station,
            'pr_post_office'=>$request->pr_post_office,
            'pr_city_id'=>$request->pr_city_id,
            'pr_country_id'=>$request->pr_country_id,
            'pa_address_line_one'=>$request->pa_address_line_one,
            'pa_address_line_two'=>$request->pa_address_line_two,
            'pa_phone_one'=>$request->pa_phone_one,
            'pa_phone_two'=>$request->pa_phone_two,
            'pa_email'=>$request->pa_email,
            'pa_village'=>$request->pa_village,
            'pa_police_station'=>$request->pa_police_station,
            'pa_post_office'=>$request->pa_post_office,
            'pa_city_id'=>$request->pa_city_id,
            'pa_country_id'=>$request->pa_country_id
        ]);

        EmployeeAcademic::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'education_id'=>$request->education_id,
            'degree_id'=>$request->degree_id,
            'major'=>$request->major,
            'institute'=>$request->institute,
            'result_id'=>$request->result_id,
            'marks'=>$request->marks,
            'year'=>$request->year,
            'duration'=>$request->duration,
            'achievement'=>$request->achievement
        ]);

        EmployeeExperience::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'company'=>$request->company,
            'business'=>$request->business,
            'designation'=>$request->designation,
            'area_of_experience'=>$request->area_of_experience,
            'experience_location'=>$request->experience_location,
            'experience_start'=>$request->experience_start,
            'experience_end'=>$request->experience_end
        ]);

        EmployeeStatus::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'status_id'=>$request->status_id,
            'date'=>$request->date,
            'description'=>$request->description,
        ]);

        EmployeeTraining::query()->where('employee_id',$employee->id)->update([
            'employee_id'=>$employee->id,
            'training_title'=>$request->training_title,
            'topics_covered'=>$request->topics_covered,
            'training_institute'=>$request->training_institute,
            'training_year'=>$request->training_year,
            'training_duration'=>$request->training_duration,
            'training_location'=>$request->training_location,
            'training_country_id'=>$request->training_country_id
        ]);

        $employee->days()->sync($request->day_id);

        return redirect('admin/employee')->with('status', 'Employee Updated Successfully!');
    }

    public function destroy($id)
    {
        $employee= Employee::query()->findOrFail($id);
        $employee->delete();
        return redirect('admin/employee')->with('status', 'Employee Deleted Successfully!');
    }


}
