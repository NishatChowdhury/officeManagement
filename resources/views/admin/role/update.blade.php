@extends('admin.layouts.master')

@section('title','Units | Update')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Form</h3>
                    </div>

                    {!! Form::model($role, ['method' => 'put', 'route' => ['role.update', $role->id]]) !!}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{ Form::label('Name','Role name') }}
                            {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Enter Role ']) }}
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong> {{ $errors->first('name') }} </strong>
                                </span>

                            @endif
                        </div>

                   </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                        {{ Form::submit('Update Role',['class'=>'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
                <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->

@stop