<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="training_title">Training Title:</label>
            {{ Form::text('training_title',$employeeTraining ? $employeeTraining->training_title : '',['class'=>'form-control ','placeholder'=>'Enter Training Title Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="topics_covered">Topics Covered:</label>
            {{ Form::text('topics_covered',$employeeTraining ? $employeeTraining->topics_covered : '',['class'=>'form-control ','placeholder'=>'Enter Topics Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="training_institute">Training Institute:</label>
            {{ Form::text('training_institute',$employeeTraining ? $employeeTraining->training_institute : '',['class'=>'form-control ','placeholder'=>'Enter Institute Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{$errors->has('training_year') ? 'has-error' : ''}}">
            {{Form::label('training_year','Training Year:' ,['class'=>'col-sm-9 control-label'])}}
            <div class="col-sm-9">
                {{Form::selectYear('training_year',1950,2050,$employeeTraining ? $employeeTraining->training_year : '' , ['class'=> 'form-control select2', 'required'=>'required' ])}}
            </div>
        </div>



    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="training_duration">Training Duration:</label>
            {{ Form::number('training_duration',$employeeTraining ? $employeeTraining->training_duration : '',['class'=>'form-control ','placeholder'=>'Enter Duration Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="training_location">Training Location:</label>
            {{ Form::text('training_location',$employeeTraining ? $employeeTraining->training_location : '',['class'=>'form-control ','placeholder'=>'Enter Location Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{$errors->has('error') ? 'has-error' : '' }}">
            {{Form::label('training_country_id','Training Country:',['class'=>'col-sm-9 control-label'])}}
            <div class="col-sm-9">
                {{Form::select('training_country_id',$countries,$employeeTraining? $employeeTraining->training_country_id : '',['class'=>'form-control select2', 'required'=>'required'])}}
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
