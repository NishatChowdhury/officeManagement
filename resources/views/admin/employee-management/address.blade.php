<div class="row">
    <div class="col-md-6">
        <h3 class="card card-light p-3 text-center" >Present Address</h3>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_address_line_one">Pr. Address(Line One):</label>
                    {{ Form::text('pr_address_line_one',null,['class'=>'form-control ','placeholder'=>'Enter Pr. Address(line One):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_address_line_two">Pr. Address(Line Two):</label>
                    {{ Form::text('pr_address_line_two',null,['class'=>'form-control ','placeholder'=>'Enter Pr. Address(line Two):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_phone_one">Pr. Phone (One):</label>
                    {{ Form::text('pr_phone_one',null,['class'=>'form-control ','placeholder'=>'Enter Pr. Phone(One):']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_phone_two">Pr. Phone (Two):</label>
                    {{ Form::text('pr_phone_two',null,['class'=>'form-control ','placeholder'=>'Enter Pr. Phone(Two):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_email">Pr. Email:</label>
                    {{ Form::email('pr_email',null,['class'=>'form-control ','placeholder'=>'Enter Pr Email:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_village">Pr. Village:</label>
                    {{ Form::email('pr_village',null,['class'=>'form-control ','placeholder'=>'Enter Pr Village:']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_police_station">Pr. Police Station:</label>
                    {{ Form::text('pr_police_station',null,['class'=>'form-control ','placeholder'=>'Enter Pr Police Station:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_post_office">Pr. Post Office:</label>
                    {{ Form::text('pr_post_office',null,['class'=>'form-control ','placeholder'=>'Enter Post Office Here:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_city_id">Pr. City:</label>
                    {{ Form::text('pr_city_id',null,['class'=>'form-control','placeholder'=>'Enter Pr. City:']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_country_id">Pr. Country:</label>
                    {{ Form::select('pr_country_id',$countries,null,['class'=>'form-control select2','placeholder'=>'Select Country']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="card card-light p-3 text-center" >Permanent Address</h3>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_address_line_one">Pa. Address(Line One):</label>
                    {{ Form::text('pa_address_line_one',null,['class'=>'form-control ','placeholder'=>'Enter Pa. Address(line One):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pr_address_line_two">Pa. Address(Line Two):</label>
                    {{ Form::text('pa_address_line_two',null,['class'=>'form-control ','placeholder'=>'Enter Pa. Address(line Two):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_phone_one">Pa. Phone (One):</label>
                    {{ Form::text('pa_phone_one',null,['class'=>'form-control ','placeholder'=>'Enter Pa. Phone(One):']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_phone_two">Pa. Phone (Two):</label>
                    {{ Form::text('pa_phone_two',null,['class'=>'form-control ','placeholder'=>'Enter Pa. Phone(Two):']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_email">Pa. Email:</label>
                    {{ Form::email('pa_email',null,['class'=>'form-control ','placeholder'=>'Enter Pa Email:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_village">Pa. Village:</label>
                    {{ Form::email('pa_village',null,['class'=>'form-control ','placeholder'=>'Enter Pa Village:']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_police_station">Pa. Police Station:</label>
                    {{ Form::text('pa_police_station',null,['class'=>'form-control ','placeholder'=>'Enter Pa Police Station:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_post_office">Pa. Post Office:</label>
                    {{ Form::text('pa_post_office',null,['class'=>'form-control ','placeholder'=>'Enter Post Office Here:']) }}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_city_id">Pa. City:</label>
                    {{ Form::text('pa_city_id',null,['class'=>'form-control','placeholder'=>'Enter Pr. City:']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="pa_country_id">Pa. Country:</label>
                    {{ Form::select('pa_country_id',$countries,null,['class'=>'form-control select2','placeholder'=>'Select Country']) }}
                </div>
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
