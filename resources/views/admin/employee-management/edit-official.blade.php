<div class="row">
    <div class="col">
        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
            {!! Form::label('department_id', 'Department:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('department_id',$departments,$employeeOfficial ? $employeeOfficial->department_id : '', ['id' =>
                'department_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('department_id') }}</small>
            </div>
        </div>
    </div>


    <div class="col">
        <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }}">
            {!! Form::label('designation_id', 'Designation:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('designation_id',$designations, $employeeOfficial ? $employeeOfficial->designation_id : '', ['id' =>
                'designation_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('designation_id') }}</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="joining_date">Joining Date:</label>
            {{ Form::date('joining_date',$employeeOfficial ? $employeeOfficial->joining_date : '',['class'=>'form-control ','placeholder'=>'Enter Date:']) }}
        </div>
    </div>

</div>
<div class="row">
    <div class="col">
        <div class="form-group{{ $errors->has('calender_code_id') ? ' has-error' : '' }}">
            {!! Form::label('calender_code_id', 'Calendar Code:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('calender_code_id', $calendars, $employeeOfficial ? $employeeOfficial->calender_code_id : '', ['id' =>
                'calender_code_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('calender_code_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group{{ $errors->has('shift_id') ? ' has-error' : '' }}">
            {!! Form::label('shift_id', 'Shift:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('shift_id', $shifts, $employeeOfficial ? $employeeOfficial->shift_id : '', ['id' =>
                'shift_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('shift_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="gross">Gross:</label>
            {{ Form::number('gross',$employeeOfficial ? $employeeOfficial->gross : '',['class'=>'form-control ','placeholder'=>'Enter Gross Here:']) }}
        </div>
    </div>
</div>




@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
