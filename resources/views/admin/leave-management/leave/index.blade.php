@extends('admin.leave-management.layouts.master')

@section('title','Settings | Leave ')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Leave ')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Leave ')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff"></i></span>Total Found : {{ $leaves->count() }}</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <a href="{{ url('admin/leave/create') }}" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Employee No.') }}</th>
                                    <th>{{ __('Leave Category') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Leave From') }}</th>
                                    <th>{{ __('Leave To') }}</th>
                                    <th>{{ __('Days') }}</th>
                                    <th>{{ __('Approved By') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaves as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->employee ? $data->employee->name : '' }}</td>
                                        <td>{{ $data->leaveCategory->name }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->leave_from }}</td>
                                        <td>{{ $data->leave_to }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->approved_by }}</td>
                                        <td>
                                            {{ Form::open(['url'=>['admin/leave',$data->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ route('leave.edit',$data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{ $leaves->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this account head?');
            return !!x;
        }
    </script>
@stop

