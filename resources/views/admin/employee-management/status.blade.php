<div class="row">
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
            {!! Form::label('status_id', 'Status:', ['class' => 'col-sm-9
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('status_id', $status, null, ['id' =>
                'status_id', 'class' =>
                'form-control ', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('status_id') }}</small>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="date">Date:</label>
            {{ Form::date('date',null,['class'=>'form-control ','placeholder'=>'Enter Date Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="description">Description:</label>
            {{ Form::text('description',null,['class'=>'form-control ','placeholder'=>'Enter Description Here:']) }}
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
