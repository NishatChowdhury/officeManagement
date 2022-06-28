<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="employee_id">Employee No.:</label>
            {{ Form::select('employee_id',$employee,null,['class'=>'form-control select2','placeholder'=>'Select Employee:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="date">Date:</label>
            {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Enter Date Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="balance">Balance:</label>
            {{ Form::number('balance',null,['class'=>'form-control','placeholder'=>'Enter Balance Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="previous_balance">Previous Balance:</label>
            {{ Form::number('previous_balance',null,['class'=>'form-control','placeholder'=>'Enter Previous Balance Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="next_schedule">Next Schedule:</label>
            {{ Form::date('next_schedule',null,['class'=>'form-control','placeholder'=>'Enter Next Schedule Here:']) }}
        </div>
    </div>
</div>

<div class="col">
    <button type="submit" class="btn btn-success" > Create</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
</div>


    @section('script')
        <script>
            $(function () {
                $('.select2').select2();
            });
        </script>
@stop
