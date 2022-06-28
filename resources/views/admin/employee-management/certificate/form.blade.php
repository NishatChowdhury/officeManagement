<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="employee_id">Employee No:</label>
            {{ Form::select('employee_id',$employee,null,['class'=>'form-control select2','placeholder'=>'Select Employee']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="certification">Certification:</label>
            {{ Form::text('certification',null,['class'=>'form-control','placeholder'=>'Enter Certification']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="certification_institute">Certification Institute:</label>
            {{ Form::text('certification_institute',null,['class'=>'form-control','placeholder'=>'Enter Certification Institute']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="certification_location">Certification Location:</label>
            {{ Form::text('certification_location',null,['class'=>'form-control','placeholder'=>'Enter Certification Location']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="certification_start">Certification Start:</label>
            {{ Form::date('certification_start',null,['class'=>'form-control','placeholder'=>'Enter Date']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="certification_end">Certification End:</label>
            {{ Form::date('certification_end',null,['class'=>'form-control','placeholder'=>'Enter Date']) }}
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
