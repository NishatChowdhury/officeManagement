<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="name">Name:</label>
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Status Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="is_active">Is active:</label>
            <input type="checkbox" name="is_active" value="1" class="flat-red" {{ $status->is_active == 1 ? 'checked' : '' }}>
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
