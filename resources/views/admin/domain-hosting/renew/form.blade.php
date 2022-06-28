<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="renewable_id">Renewable ID:</label>
            {{ Form::number('renewable_id',null,['class'=>'form-control','placeholder'=>'Enter Renewable id:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="renewable_type">Renewable Type:</label>
            {{ Form::text('renewable_type',null,['class'=>'form-control','placeholder'=>'Enter Renewable type Here:']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="date">Date:</label>
            {{ Form::date('date',null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="amount">Amount:</label>
            {{ Form::text('amount',null,['class'=>'form-control','placeholder'=>'Enter Amount Here:']) }}
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
