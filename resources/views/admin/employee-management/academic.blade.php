<div class="row">
    <div class="col">
        <div class="form-group{{ $errors->has('education_id') ? ' has-error' : '' }}">
            {!! Form::label('education_id', 'Education', ['class' => 'col-sm-9 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('education_id', $education, null, ['id' => 'education_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('education_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="degree_id">Degree:</label>
            {{ Form::text('degree_id',null,['class'=>'form-control ','placeholder'=>'Enter Degree Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="major">Major:</label>
            {{ Form::text('major',null,['class'=>'form-control ','placeholder'=>'Enter Major Subject Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="institute">Institute:</label>
            {{ Form::text('institute',null,['class'=>'form-control ','placeholder'=>'Enter Institute Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group{{ $errors->has('result_id') ? ' has-error' : '' }}">
            {!! Form::label('result_id', 'Academic Result', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('result_id', $academicResult, null, ['id' =>
                'result_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('result_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="marks">Marks:</label>
            {{ Form::text('marks',null,['class'=>'form-control ','placeholder'=>'Enter Marks Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
            {!! Form::label('year', 'Year', ['class' => 'col-sm-9 control-label']) !!}
            <div class="col-sm-9">
                {{ Form::selectYear('year',1950,2050,null,['class'=>'form-control select2 ']) }}
                <small class="text-danger">{{ $errors->first('year') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="duration">Duration:</label>
            {{ Form::text('duration',null,['class'=>'form-control ','placeholder'=>'Enter Duration Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="achievement">Achievement:</label>
            {{ Form::text('achievement',null,['class'=>'form-control ','placeholder'=>'Enter Achievement Here:']) }}
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
