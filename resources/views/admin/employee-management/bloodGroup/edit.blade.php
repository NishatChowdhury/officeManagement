@extends('admin.employee-management.layouts.master')

@section('title','Settings | Edit Blood Group')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Edit Blood Group')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Settings')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Edit Blood Group')}}</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::model($bloodGroup,['route'=>['blood-group.update',$bloodGroup->id],'method'=>'patch']) }}
                            @include('admin.employee-management.bloodGroup.form')
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
