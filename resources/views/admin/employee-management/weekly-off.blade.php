<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="form-group">
            <label for="day_id">Off Day:</label>
            {{ Form::select('day_id',$days , null , ['class'=>'form-control select2','multiple']) }}
        </div>
    </div>
    <div class="col-4"></div>
</div>

