<h3 class="card card-light p-3 text-center" >Present Address</h3>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pr_address_line_one">Present Address(Line One):</label>
            {{ Form::text('pr_address_line_one',$employeeAddress ? $employeeAddress->pr_address_line_one : '',['class'=>'form-control ','placeholder'=>'Enter Pr. Address(line One):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_address_line_two">Present Address(Line Two):</label>
            {{ Form::text('pr_address_line_two',$employeeAddress ? $employeeAddress->pr_address_line_two : '',['class'=>'form-control ','placeholder'=>'Enter Pr. Address(line Two):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_phone_one">Pr. Phone (One):</label>
            {{ Form::text('pr_phone_one',$employeeAddress ? $employeeAddress->pr_phone_one : '',['class'=>'form-control ','placeholder'=>'Enter Pr. Phone(One):']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pr_phone_two">Pr. Phone (Two):</label>
            {{ Form::text('pr_phone_two',$employeeAddress ? $employeeAddress->pr_phone_two : '',['class'=>'form-control ','placeholder'=>'Enter Pr. Phone(Two):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_email">Pr. Email:</label>
            {{ Form::email('pr_email',$employeeAddress ? $employeeAddress->pr_email : '',['class'=>'form-control ','placeholder'=>'Enter Pr Email:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_village">Pr. Village:</label>
            {{ Form::email('pr_village',$employeeAddress ? $employeeAddress->pr_village : '',['class'=>'form-control ','placeholder'=>'Enter Pr Village:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_police_station">Pr. Police Station:</label>
            {{ Form::text('pr_police_station',$employeeAddress ? $employeeAddress->pr_police_station : '',['class'=>'form-control ','placeholder'=>'Enter Pr Police Station:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pr_post_office">Pr. Post Office:</label>
            {{ Form::text('pr_post_office',$employeeAddress ? $employeeAddress->pr_post_office : '',['class'=>'form-control ','placeholder'=>'Enter Post Office Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_city_id">Pr. City:</label>
            {{ Form::text('pr_city_id',$employeeAddress ? $employeeAddress->pr_city_id : '',['class'=>'form-control','placeholder'=>'Enter Pr. City:']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="pr_country_id">Pr. Country:</label>
                {{ Form::select('pr_country_id',$countries,$employeeAddress ? $employeeAddress->pr_country_id : '',['class'=>'form-control select2','placeholder'=>'Select Country']) }}
            </div>
        </div>
    </div>
</div>
<h3 class="card card-light p-3 text-center" >Permanent Address</h3>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pr_address_line_one">Pa. Address(Line One):</label>
            {{ Form::text('pa_address_line_one',$employeeAddress ? $employeeAddress->pa_address_line_one : '',['class'=>'form-control ','placeholder'=>'Enter Pa. Address(line One):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pr_address_line_two">Pa. Address(Line Two):</label>
            {{ Form::text('pa_address_line_two',$employeeAddress ? $employeeAddress->pa_address_line_two : '',['class'=>'form-control ','placeholder'=>'Enter Pa. Address(line Two):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pa_phone_one">Pa. Phone (One):</label>
            {{ Form::text('pa_phone_one',$employeeAddress ? $employeeAddress->pa_phone_one : '',['class'=>'form-control ','placeholder'=>'Enter Pa. Phone(One):']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pa_phone_two">Pa. Phone (Two):</label>
            {{ Form::text('pa_phone_two',$employeeAddress ? $employeeAddress->pa_phone_two : '',['class'=>'form-control ','placeholder'=>'Enter Pa. Phone(Two):']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pa_email">Pa. Email:</label>
            {{ Form::email('pa_email',$employeeAddress ? $employeeAddress->pa_email : '',['class'=>'form-control ','placeholder'=>'Enter Pa Email:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pa_village">Pa. Village:</label>
            {{ Form::email('pa_village',$employeeAddress ? $employeeAddress->pa_village : '',['class'=>'form-control ','placeholder'=>'Enter Pa Village:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pa_police_station">Pa. Police Station:</label>
            {{ Form::text('pa_police_station',$employeeAddress ? $employeeAddress->pa_police_station : '',['class'=>'form-control ','placeholder'=>'Enter Pa Police Station:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pa_post_office">Pa. Post Office:</label>
            {{ Form::text('pa_post_office',$employeeAddress ? $employeeAddress->pa_post_office : '',['class'=>'form-control ','placeholder'=>'Enter Post Office Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pa_city_id">Pa. City:</label>
            {{ Form::text('pa_city_id',$employeeAddress ? $employeeAddress->pa_city_id : '',['class'=>'form-control','placeholder'=>'Enter Pr. City:']) }}
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="pa_country_id">Pa. Country:</label>
                {{ Form::select('pa_country_id',$countries,$employeeAddress ? $employeeAddress->pa_country_id : '',['class'=>'form-control select2','placeholder'=>'Select Country']) }}
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
