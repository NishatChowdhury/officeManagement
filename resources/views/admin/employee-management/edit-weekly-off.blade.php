<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="form-group">
            <label for="day_id">Off Day:</label>
            {{ Form::select('day_id[]',$days,$employeeOff ? $employeeOff->day_id : '',['class'=>'form-control select2','placeholder'=>'Select Off Day', 'multiple']) }}
        </div>
    </div>
    <div class="col-4"></div>
</div>


    @section('script')
        <script>
            $(function () {
                $('.select2').select2();
            });
        </script>
@stop
