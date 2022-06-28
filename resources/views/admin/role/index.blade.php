@extends('admin.layouts.master')
@section('title','ROLE | SUPER SYNTHETICS LTD')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">  Role's  </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-4 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Save Form</h3>
                        </div>
                        {{ Form::open(['route' => 'role.store','role'=>'form','method'=>'post']) }}
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {{ Form::label('Name','Role Name') }}
                                {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Enter Role Name']) }}
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong> {{ $errors->first('name') }} </strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('permission_id') ? 'has-error' : '' }}">
                                {{ Form::label('permission_id','Permission') }}
                                {{ Form::select('permission_id[]',$permissions,null,['class'=>'form-control permission','multiple'=>true]) }}
                                @if($errors->has('permission_id'))
                                    <span class="help-block">
                                        <strong> {{ $errors->first('permission_id') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            {{ Form::submit('Save Role',['class'=>'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="box">
                        <div class="box-header">


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table id="role" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#SL </th>
                                    <th>Name</th>
                                    <th>Permission's</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=0; @endphp
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                {{ $permission->name }} ,
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit',$role->id) }}" class="fa fa-edit btn btn-success"></a> || <a href="#" class="fa fa-trash btn btn-danger"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $(".permission").select2({});
            $("#role").dataTable();

        });
    </script>
@stop