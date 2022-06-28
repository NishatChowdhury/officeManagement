<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Enter Hosting Name']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="provider_id">Provider:</label>
            {{ Form::select('provider_id',$providers,null,['class'=>'form-control select2','placeholder'=>'Select a provider']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="package">Package:</label>
            {{ Form::text('package',null,['class'=>'form-control','placeholder'=>'Enter Package']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="amount">Amount:</label>
            {{ Form::text('amount',null,['class'=>'form-control','placeholder'=>'Enter Amount']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="registration_date">Registration Date:</label>
            {{ Form::date('registration_date',null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="expire_date">Expire Date:</label>
            {{ Form::date('expire_date',null,['class'=>'form-control ']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="note">Note:</label>
            {{ Form::textarea('note',null,['class'=>'form-control','placeholder'=>'Enter Note Here:']) }}
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
