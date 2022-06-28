<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control ','placeholder'=>'Enter Provider Name']) }}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="url">Url:</label>
            {{ Form::text('url',null,['class'=>'form-control','placeholder'=>'Enter Url']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="balance">Balance:</label>
            {{ Form::text('balance',null,['class'=>'form-control','placeholder'=>'Enter Balance']) }}
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
