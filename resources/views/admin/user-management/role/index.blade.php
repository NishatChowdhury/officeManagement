@extends('admin.user-management.layouts.master')

@section('title','User Management | Roles')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{ __('Add Role/Permission') }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__ ('Role') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </section>

    <!-- ***/Notices page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route' => 'role.store','role'=>'form','method'=>'post']) }}
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
                                <div class="row">
                                        <button type="submit" class="btn btn-success btn-sm" > Create</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Cancel</a>
                                </div>
                            </div>

                            {{ Form::close() }}
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                        <table id="role" class="table table-bordered table-hover table-responsive">
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
                                        <a href="{{ route('role.edit',$role->id) }}" class="fa fa-edit btn btn-success"></a>
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
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $(".permission").select2({});
            $("#role").dataTable();

        });
    </script>
@stop