<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="training_title">Training Title:</label>
            {{ Form::text('training_title',null,['class'=>'form-control ','placeholder'=>'Enter Training Title Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="topics_covered">Topics Covered:</label>
            {{ Form::text('topics_covered',null,['class'=>'form-control ','placeholder'=>'Enter Topics Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="training_institute">Training Institute:</label>
            {{ Form::text('training_institute',null,['class'=>'form-control ','placeholder'=>'Enter Institute Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group{{ $errors->has('training_year') ? ' has-error' : '' }}">
            {!! Form::label('training_year', 'Training Year:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::selectYear('training_year',1900,2050,null, ['id' =>
                'training_year', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('training_year') }}</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="training_duration">Training Duration:</label>
            {{ Form::number('training_duration',null,['class'=>'form-control ','placeholder'=>'Enter Duration Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="training_location">Training Location:</label>
            {{ Form::text('training_location',null,['class'=>'form-control ','placeholder'=>'Enter Location Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group{{ $errors->has('training_country_id') ? ' has-error' : '' }}">
            {!! Form::label('training_country_id', 'Training Country:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('training_country_id', $countries, null, ['id' =>
                'training_country_id', 'class' =>
                'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('training_country_id') }}</small>
            </div>
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
