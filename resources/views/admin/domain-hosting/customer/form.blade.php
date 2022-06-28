<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Enter Customer Name:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="address">Address:</label>
            {{ Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Address Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            {{ Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Enter Mobile Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="email">Email:</label>
            {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="contact_person">Contact Person:</label>
            {{ Form::text('contact_person',null,['class'=>'form-control','placeholder'=>'Enter Contact Person Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="contact_person_phone">Contact Person Phone:</label>
            {{ Form::text('contact_person_phone',null,['class'=>'form-control','placeholder'=>'Enter Contact Person Phone Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <button type="submit" class="btn btn-success"> {{ $submitButtonText }}</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger">{{ __('Cancel') }}</a>
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
