@extends('admin.employee-management.layouts.master')

@section('title','Settings | Blood Group')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Blood Group')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Blood Group')}}</li>
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
                                <div>
                                    <a href="{{ url('admin/blood-group/create') }}" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bloodGroups as $key => $group)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->description }}</td>
                                        <td>
                                            {{ Form::open(['method'=>'PUT','url'=>['admin/blood-group/check-status/'.$group->id],'style'=>'display:inline']) }}
                                            @if($group->is_active == 1)
                                                {{ Form::submit('Active',['class'=>'btn btn-success btn-sm']) }}
                                            @else
                                                {{ Form::submit('In Active',['class'=>'btn btn-danger btn-sm']) }}
                                            @endif
                                            {{ Form::close() }}
                                        </td>
                                        <td>
                                            {{ Form::open(['url'=>['admin/blood-group',$group->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ route('blood-group.edit',$group->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
                                    {{ $bloodGroups->links() }}
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

