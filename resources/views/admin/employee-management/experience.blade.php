<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="company">Company:</label>
            {{ Form::text('company',null,['class'=>'form-control','placeholder'=>'Enter Company']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="business">Business:</label>
            {{ Form::text('business',null,['class'=>'form-control','placeholder'=>'Enter Business']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="designation">Designation:</label>
            {{ Form::text('designation',null,['class'=>'form-control','placeholder'=>'Enter Designation']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="area_of_experience">Area Of Experience:</label>
            {{ Form::text('area_of_experience',null,['class'=>'form-control','placeholder'=>'Enter Experience']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="experience_location">Experience Location:</label>
            {{ Form::text('experience_location',null,['class'=>'form-control','placeholder'=>'Enter Location']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="experience_start">Experience Start:</label>
            {{ Form::date('experience_start',null,['class'=>'form-control','placeholder'=>'Enter Date']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="experience_end">Experience End:</label>
            {{ Form::date('experience_end',null,['class'=>'form-control','placeholder'=>'Enter Date']) }}
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
