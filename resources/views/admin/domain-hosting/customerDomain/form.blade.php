<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="domain_id">Domain:</label>
            {{ Form::select('domain_id',$domains,null,['class'=>'form-control select2','placeholder'=>'Select a Domain']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="customer_id">Customer:</label>
            {{ Form::select('customer_id',$customers,null,['class'=>'form-control select2','placeholder'=>'Select a Customer']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="registration_date">Registration Date:</label>
            {{ Form::date('registration_date',null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="expire_date">Expire Date:</label>
            {{ Form::date('expire_date',null,['class'=>'form-control ']) }}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="amount">Amount:</label>
            {{ Form::text('amount',null,['class'=>'form-control','placeholder'=>'Enter Amount']) }}
        </div>
    </div>
</div>
<div class="col">
    <div class="form-group">
        <label for="is_active">Is active:</label>
        <input type="checkbox" name="is_active" value="1" class="flat-red" {{ $customerDomain->is_active == 1 ? 'checked' : '' }}>
    </div>
</div>

<div class="col">
    <button type="submit" class="btn btn-success" > {{ $submitButtonText }}</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
</div>


    @section('script')
        <script>
            $(function () {
                $('.select2').select2();
            });
        </script>
@stop
