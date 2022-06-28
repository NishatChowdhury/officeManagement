@extends('admin.employee-management.layouts.master')

@section('title','Settings | Employee')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{ __('Add New Employee') }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__ ('Employee') }}</li>
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
                            <div class="card-header d-flex p-0">
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link active" href="#basic_info" data-toggle="tab" style="font-weight: bold;">Basic Info</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#official" data-toggle="tab" style="font-weight: bold;">Official</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab" style="font-weight: bold;">Address</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#academic" data-toggle="tab" style="font-weight: bold;">Academics</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#experience" data-toggle="tab" style="font-weight: bold;">Experiences</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#status" data-toggle="tab" style="font-weight: bold;">Status</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#training" data-toggle="tab" style="font-weight: bold;">Training</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#weeklyOff" data-toggle="tab" style="font-weight: bold;">Weekly Off</a></li>
                                </ul>
                            </div>

                            {{ Form::open(['url'=>'admin/employee','method'=>'POST', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            <div class="card-body">
                                <ul>
                                    @php $i=0; @endphp
                                    @foreach($errors->all() as $error)
                                        <li> {{ ++$i }} <span class="has-error"><strong> {{ $error }} </strong></span></li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic_info">
                                        @include('admin.employee-management.basic-info')
                                    </div>
                                    <div class="tab-pane" id="address">
                                        @include('admin.employee-management.address')
                                    </div>
                                    <div class="tab-pane" id="official">
                                        @include('admin.employee-management.official')
                                    </div>
                                    <div class="tab-pane" id="academic">
                                        @include('admin.employee-management.academic')
                                    </div>
                                    <div class="tab-pane" id="status">
                                        @include('admin.employee-management.status')
                                    </div>
                                    <div class="tab-pane" id="experience">
                                        @include('admin.employee-management.experience')
                                    </div>
                                    <div class="tab-pane" id="training">
                                        @include('admin.employee-management.training')
                                    </div>
                                    <div class="tab-pane" id="weeklyOff">
                                        @include('admin.employee-management.weekly-off')
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center">
                            <div class="form-group">
                                {{ Form::button('SAVE ',['class'=>'far fa-save fa-3x btn btn-success','type'=>'submit']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

