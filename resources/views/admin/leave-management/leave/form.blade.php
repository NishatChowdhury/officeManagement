<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="employee_id">Employee No.:</label>
            {{ Form::select('employee_id',$employee,null,['class'=>'form-control select2']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="leave_category_id">Leave Category:</label>
            {{ Form::select('leave_category_id',$leaveCategories,null,['class'=>'form-control select2']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="date">Date:</label>
            {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Enter Date Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="leave_from">Leave From:</label>
            {{ Form::date('leave_from',null,['class'=>'form-control','placeholder'=>'Enter Date Here:']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="leave_to">Leave To:</label>
            {{ Form::date('leave_to',null,['class'=>'form-control','placeholder'=>'Enter Date Here:']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="approved_by">Approved By:</label>
            {{ Form::select('approved_by',$users,null,['class'=>'form-control select2']) }}
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
