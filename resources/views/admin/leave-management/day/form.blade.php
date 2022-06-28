<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Day Here: (EX:Saturday)']) }}
        </div>
    </div>
    <div class="col-4"></div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <button type="submit" class="btn btn-success" > Create</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
    </div>
    <div class="col-4"></div>
</div>

