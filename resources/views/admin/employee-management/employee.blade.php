@extends('admin.employee-management.layouts.master')

@section('title','Settings | Employee')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{__('Select one for details:')}}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Employee')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 ">
                            <div class="basic-info mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target=".basicInfo">Employee Basic Info</button>
                                <div class="modal fade basicInfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Basic Info')}}</h3>
                                                <hr>
                                                    <div class="row p-5">
                                                        <div class="col-4">
                                                            <img src="{{ asset('assets/images/employees/') }}/{{ $employee->image }}" height="200" width="200" alt="">
                                                        </div>
                                                        <div class="col-4">
                                                            <p><b>Employee No:</b> {{$employee->employee_no}}</p>
                                                            <p><b>Name:</b> {{$employee->name}}</p>
                                                            <p><b>Bn Name:</b> {{$employee->bn_name}}</p>
                                                            <p><b>Father:</b> {{$employee->father}}</p>
                                                            <p><b>Mother:</b> {{$employee->mother}}</p>
                                                            <p><b>Gender:</b> {{$employee->gender->name}}</p>
                                                            <p><b>Date of Birth:</b> {{$employee->dob}}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p><b>Marital Status:</b> {{$employee->maritalStatus->name}} </p>
                                                            <p><b>Spouse:</b> {{$employee->spouse}}</p>
                                                            <p><b>Blood Group:</b> {{$employee->bloodGroup->name}}</p>
                                                            <p><b>Religion:</b> {{$employee->religion->name}}</p>
                                                            <p><b>Nid:</b> {{$employee->nid}}</p>
                                                            <p><b>Passport:</b> {{$employee->passport}}</p>
                                                            <p><b>Driving Licence:</b> {{$employee->driving_license}}</p>
                                                        </div>
                                                    </div>
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="official mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#official">Employee Official</button>
                                <div class="modal fade " id="official" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class=" p-2">
                                                <h3 class="text-center">{{__('Employee Official Info')}}</h3>
                                                <hr>
                                                @foreach($employeeOfficial as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>Department:</b> {{$data->department->name}}</p>
                                                            <p><b>Designation:</b> {{$data->designation->name}}</p>
                                                            <p><b>Shift:</b> {{$data->shift->name}}</p>
                                                            <p><b>Calendar Code:</b> {{$data->calendar->name ?? ''}}</p>
                                                            <p><b>Joining Date:</b> {{$data->joining_date}}</p>
                                                            <p><b>Gross:</b> {{$data->gross}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="address mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#address">Employee Address Info</button>
                                <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Address Info')}}</h3>
                                                <hr>
                                                @foreach($employeeAddress as $data)
                                                    <div class="row p-5">
                                                        <div class="col-6">
                                                            <p><b>Pr. Address(Line One):</b> {{$data->pr_address_line_one}}</p>
                                                            <p><b>Pr. Address(Line Two):</b> {{$data->pr_address_line_two}}</p>
                                                            <p><b>Pr. Phone (One):</b> {{$data->pr_phone_one}}</p>
                                                            <p><b>Pr. Phone (Two):</b> {{$data->pr_phone_two}}</p>
                                                            <p><b>Pr. Email:</b> {{$data->pr_email}}</p>
                                                            <p><b>Pr. Village:</b> {{$data->pr_village}}</p>
                                                            <p><b>Pr. Police Station:</b> {{$data->pr_police_station}}</p>
                                                            <p><b>Pr. Post Office:</b> {{$data->pr_post_office}}</p>
                                                            <p><b>Pr. City:</b> {{$data->pr_city_id}}</p>
                                                            <p><b>Pr. Country:</b> {{$data->prCountry->name ?? ''}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><b>Pa. Address(Line One):</b> {{$data->pa_address_line_one}}</p>
                                                            <p><b>Pa. Address(Line Two):</b> {{$data->pa_address_line_two}}</p>
                                                            <p><b>Pa. Phone (One):</b> {{$data->pa_phone_one}}</p>
                                                            <p><b>Pa. Phone (Two):</b> {{$data->pa_phone_two}}</p>
                                                            <p><b>Pa. Email:</b> {{$data->pa_email}}</p>
                                                            <p><b>Pa. Village:</b> {{$data->pa_village}}</p>
                                                            <p><b>Pa. Police Station:</b> {{$data->pa_police_station}}</p>
                                                            <p><b>Pa. Post Office:</b> {{$data->pa_post_office}}</p>
                                                            <p><b>Pa. City:</b> {{$data->pa_city_id}}</p>
                                                            <p><b>Pa. Country:</b> {{$data->paCountry->name ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="address mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#academics">Employee Academics</button>
                                <div class="modal fade" id="academics" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Academics Info')}}</h3>
                                                <hr>
                                                @foreach($employeeAcademic as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>{{__('Education')}}:</b> {{$data->education->name}}</p>
                                                            <p><b>{{__('Degree')}}:</b> {{$data->degree_id}}</p>
                                                            <p><b>{{__('Major')}}:</b> {{$data->major}}</p>
                                                            <p><b>{{__('Education')}}:</b> {{$data->institute}}</p>
                                                            <p><b>{{__('Result')}}:</b> {{$data->academicResult->name}}</p>
                                                            <p><b>{{__('Marks')}}:</b> {{$data->marks}}</p>
                                                            <p><b>{{__('Year')}}:</b> {{$data->year}}</p>
                                                            <p><b>{{__('Duration')}}:</b> {{$data->duration}}</p>
                                                            <p><b>{{__('Achievement')}}:</b> {{$data->achievement}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3 ">
                            <div class="basic-info mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#experience">Employee Experiences</button>
                                <div class="modal fade" id="experience" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Experiences')}}</h3>
                                                <hr>
                                                @foreach($employeeExperience as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>{{__('Company:')}}</b> {{$data->company}}</p>
                                                            <p><b>{{__('Business:')}}</b> {{$data->business}}</p>
                                                            <p><b>{{__('Designation:')}}</b> {{$data->designation}}</p>
                                                            <p><b>{{__('Area of Experience:')}}</b> {{$data->area_of_experience}}</p>
                                                            <p><b>{{__('Experience Location:')}}</b> {{$data->experience_location}}</p>
                                                            <p><b>{{__('Experience Start:')}}</b> {{$data->experience_start}}</p>
                                                            <p><b>{{__('Experience End:')}}</b> {{$data->experience_end}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="official mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#status">{{__('Employee Status')}}</button>
                                <div class="modal fade " id="status" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class=" p-2">
                                                <h3 class="text-center">{{__('Employee Status')}}</h3>
                                                <hr>
                                                @foreach($employeeStatus as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>{{__('Status')}}</b> {{$data->status->name ?? ''}}</p>
                                                            <p><b>{{__('Date')}}</b> {{$data->date}}</p>
                                                            <p><b>{{__('Date')}}</b> {{$data->date}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="address mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#training">{{__('Employee Training')}}</button>
                                <div class="modal fade" id="training" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Training')}}</h3>
                                                <hr>
                                                @foreach($employeeTraining as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>{{__('Training Title')}}</b> {{$data->training_title}}</p>
                                                            <p><b>{{__('Topics Covered')}}</b> {{$data->topics_covered}}</p>
                                                            <p><b>{{__('Training Institute')}}</b> {{$data->training_institute}}</p>
                                                            <p><b>{{__('Training Year')}}</b> {{$data->training_year}}</p>
                                                            <p><b>{{__('Training Duration')}}</b> {{$data->training_duration}}</p>
                                                            <p><b>{{__('Training Location')}}</b> {{$data->training_location}}</p>
                                                            <p><b>{{__('Training Country')}}</b> {{$data->country->name ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="address mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#weeklyOff">{{__('Employee Weekly Off')}}</button>
                                <div class="modal fade" id="weeklyOff" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="accordion-body p-2">
                                                <h3 class="text-center">{{__('Employee Weekly Off')}}</h3>
                                                <hr>
                                                @foreach($employeeOff as $data)
                                                    <div class="row p-5">
                                                        <div class="col">
                                                            <p><b>{{__('Off Day')}}:</b> {{$data->day->name ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col text-center">
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">{{__('Close')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>









{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="accordion" id="accordionExample">--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="headingOne">--}}
{{--                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                            {{__('Employee Basic Info')}}--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div class="card">--}}
{{--                        <div class="container-fluid">--}}
{{--                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    @foreach($employee as $data)--}}
{{--                                        <div class="row p-5">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <img src="{{ asset('assets/images/employees/') }}/{{ $data->image }}" height="200" width="200" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <p><b>Employee No:</b> {{$data->employee_no}}</p>--}}
{{--                                                <p><b>Name:</b> {{$data->name}}</p>--}}
{{--                                                <p><b>Bn Name:</b> {{$data->bn_name}}</p>--}}
{{--                                                <p><b>Father:</b> {{$data->father}}</p>--}}
{{--                                                <p><b>Mother:</b> {{$data->mother}}</p>--}}
{{--                                                <p><b>Gender:</b> {{$data->gender->name}}</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <p><b>Date of Birth:</b> {{$data->dob}}</p>--}}
{{--                                                <p><b>Marital Status:</b> {{$data->maritalStatus->name}}</p>--}}
{{--                                                <p><b>Spouse:</b> {{$data->spouse}}</p>--}}
{{--                                                <p><b>Blood Group:</b> {{$data->bloodGroup->name}}</p>--}}
{{--                                                <p><b>Religion:</b> {{$data->religion->name}}</p>--}}
{{--                                                <p><b>Nid:</b> {{$data->nid}}</p>--}}
{{--                                                <p><b>Passport:</b> {{$data->passport}}</p>--}}
{{--                                                <p><b>Driving Licence:</b> {{$data->driving_license}}</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="headingOne">--}}
{{--                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                            {{__('Employee Official')}}--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div class="card">--}}
{{--                        <div class="container-fluid">--}}
{{--                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    @foreach($employeeOfficial as $data)--}}
{{--                                        <div class="row p-5">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <p><b>Employee No:</b> {{$data->employee_no}}</p>--}}
{{--                                                <p><b>Name:</b> {{$data->name}}</p>--}}
{{--                                                <p><b>Bn Name:</b> {{$data->bn_name}}</p>--}}
{{--                                                <p><b>Father:</b> {{$data->father}}</p>--}}
{{--                                                <p><b>Mother:</b> {{$data->mother}}</p>--}}
{{--                                                <p><b>Gender:</b> {{$data->gender->name}}</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <p><b>Date of Birth:</b> {{$data->dob}}</p>--}}
{{--                                                <p><b>Marital Status:</b> {{$data->maritalStatus->name}}</p>--}}
{{--                                                <p><b>Spouse:</b> {{$data->spouse}}</p>--}}
{{--                                                <p><b>Blood Group:</b> {{$data->bloodGroup->name}}</p>--}}
{{--                                                <p><b>Religion:</b> {{$data->religion->name}}</p>--}}
{{--                                                <p><b>Nid:</b> {{$data->nid}}</p>--}}
{{--                                                <p><b>Passport:</b> {{$data->passport}}</p>--}}
{{--                                                <p><b>Driving Licence:</b> {{$data->driving_license}}</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

