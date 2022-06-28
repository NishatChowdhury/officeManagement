<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="in">In:</label>
            {{ Form::time('in',null,['class'=>'form-control','placeholder'=>'Enter In time Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="out">Out:</label>
            {{ Form::time('out',null,['class'=>'form-control','placeholder'=>'Enter Out time Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="grace">Grace:</label>
            {{ Form::number('grace',null,['class'=>'form-control','placeholder'=>'Enter Grace Here:']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="description">Description:</label>
            {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Enter Grace Here:']) }}
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
