<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            {{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Enter Domain Name']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="alias">{{ __('Alias') }}:</label>
            {{ Form::text('alias',null,['class'=>'form-control','placeholder'=>'Enter Alias']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="type">Type:</label>
            {{ Form::text('type',null,['class'=>'form-control','placeholder'=>'Enter Type']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="provider_id">Provider:</label>
            {{ Form::select('provider_id',$providers,null,['class'=>'form-control select2','placeholder'=>'Select a provider']) }}
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            {{ Form::text('amount',null,['class'=>'form-control','placeholder'=>'Enter Amount']) }}
        </div>
        <div class="form-group">
            <label for="registration_date">Registration Date:</label>
            {{ Form::date('registration_date',null,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            <label for="expire_date">Expire Date:</label>
            {{ Form::date('expire_date',null,['class'=>'form-control ']) }}
        </div>
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        <label for="note">Note:</label>
        {{ Form::textarea('note',null,['class'=>'form-control','rows'=>11,'placeholder'=>'Enter Note Here:']) }}
    </div>
</div>

<hr>

<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-success" > {{ $submitButtonText }}</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">{{ __('Cancel') }}</a>
</div>

@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
