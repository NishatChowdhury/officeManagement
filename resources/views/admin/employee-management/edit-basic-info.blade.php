<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="employee_no">Employee No:</label>
            {{ Form::text('employee_no',$employee ? $employee->employee_no : '',['class'=>'form-control','placeholder'=>'Enter Employee No:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',$employee ? $employee->name : '',['class'=>'form-control','placeholder'=>'Enter Name:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="bn_name">BN Name:</label>
            {{ Form::text('bn_name',$employee ? $employee->bn_name : '',['class'=>'form-control','placeholder'=>'Enter BN. Name:']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="father">Father Name:</label>
            {{ Form::text('father',$employee ? $employee->father : '',['class'=>'form-control','placeholder'=>'Enter Father Name:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="mother">Mother Name:</label>
            {{ Form::text('mother',$employee ? $employee->mother : '',['class'=>'form-control','placeholder'=>'Enter Mother Name:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="gender_id">Gender:</label>
            {{ Form::select('gender_id',$gender,$employee ? $employee->gender_id : '',['class'=>'form-control select2','placeholder'=>'Select Gender:']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="dob">DOB:</label>
            {{ Form::date('dob',$employee ? $employee->dob : '',['class'=>'form-control','placeholder'=>'Enter DOB:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="marital_status_id">Marital Status:</label>
                {{ Form::select('marital_status_id',$maritalStatus,$employee ? $employee->marital_status_id : '',['class'=>'form-control select2','placeholder'=>'Select Marital Status:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="spouse">Spouse:</label>
            {{ Form::text('spouse',$employee ? $employee->spouse : '',['class'=>'form-control','placeholder'=>'Enter Spouse Name:']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="blood_group_id">Blood Group:</label>
            {{ Form::select('blood_group_id',$bloodGroup,$employee ? $employee->blood_group_id : '',['class'=>'form-control select2','placeholder'=>'Select Group:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="religion_id">Religion:</label>
            {{ Form::select('religion_id',$religion,$employee ? $employee->religion_id : '',['class'=>'form-control select2','placeholder'=>'Select Religion:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="nid">NID:</label>
            {{ Form::text('nid',$employee ? $employee->nid : '',['class'=>'form-control','placeholder'=>'Enter NID:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="passport">Passport:</label>
            {{ Form::text('passport',$employee ? $employee->passport : '',['class'=>'form-control','placeholder'=>'Enter Passport No.']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="driving_license">Driving Licence:</label>
            {{ Form::text('driving_license',$employee ? $employee->driving_license : '',['class'=>'form-control','placeholder'=>'Enter Driving Licence No.']) }}
        </div>
    </div>
</div>
    <div class="col-4">
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="employee-img" class="form-control">
            @if(!empty($employee->image))
                <img src="{{ asset('assets/images/employees/') }}/{{ $employee->image }}"
                     height="70" width="70" alt="">
            @endif
            <img src="" id="employee-img-tag" width="200px" />
        </div>
    </div>


@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#employee-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#employee-img").change(function(){
            readURL(this);
        });
    </script>
@stop
