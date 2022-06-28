<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Event Name:</label>
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="calendar_id">Calendar Name:</label>
            {{ Form::select('calendar_id',$calendars,null,['class'=>'form-control select2','placeholder'=>'Select Calendar']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="description">Description:</label>
            {{ Form::text('description',null,['class'=>'form-control','placeholder'=>'Enter Description here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="start">Start Date:</label>
            {{ Form::date('start',null,['class'=>'form-control','placeholder'=>'Enter Date here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="end">end Date:</label>
            {{ Form::date('end',null,['class'=>'form-control','placeholder'=>'Enter Date here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="is_holiday">Is Holiday:</label>
            <input type="checkbox" name="is_holiday" value="1" class="flat-red" {{ $calendarEvent->is_holiday == 1 ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="sms">Sms:</label>
            <input type="checkbox" name="sms" value="1" class="flat-red" {{ $calendarEvent->sms == 1 ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="checkbox" name="email" value="1" class="flat-red" {{ $calendarEvent->email == 1 ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="is_active">Is active:</label>
            <input type="checkbox" name="is_active" value="1" class="flat-red" {{ $calendarEvent->is_active == 1 ? 'checked' : '' }}>
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
