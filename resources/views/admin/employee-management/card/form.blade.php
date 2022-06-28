<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="employee_id">Employee No:</label>
            {{ Form::select('employee_id',$employees,null,['class'=>'form-control select2','placeholder'=>'Select Employee']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="number">Card Number:</label>
            {{ Form::text('number',null,['class'=>'form-control','placeholder'=>'Enter Number Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="assigned">Assigned Date:</label>
            {{ Form::date('assigned',null,['class'=>'form-control','placeholder'=>'Enter Date:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="is_active">Is active:</label>
            <input type="checkbox" name="is_active" value="1" class="flat-red" {{ $card->is_active == 1 ? 'checked' : '' }}>
        </div>
    </div>
</div>


<div class="col-6">
    <div class="form-group">
        <label for="note">Note:</label>
        {{ Form::textarea('note',null,['class'=>'form-control','placeholder'=>'Enter Note Here::']) }}
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
