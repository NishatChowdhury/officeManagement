@extends('admin.domain-hosting.layouts.master')

@section('title','Settings | Hosting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Hosting')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Hosting')}}</li>
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
                                    <a href="{{ url('admin/hosting/create') }}" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('provider') }}</th>
                                        <th>{{ __('package') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Reg. Date') }}</th>
                                        <th>{{ __('Exp. Date') }}</th>
                                        <th>{{ __('Note') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hosting as $key => $host)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $host->name }}</td>
                                            <td>{{ $host->provider->name ?? '' }}</td>
                                            <td>{{ $host->package }}</td>
                                            <td>{{ $host->amount }}</td>
                                            <td>{{ $host->registration_date }}</td>
                                            <td>{{ $host->expire_date }}</td>
                                            <td>{{ $host->note }}</td>
                                            <td>
                                                {{ Form::open(['url'=>['admin/hosting',$host->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                <a href="{{ route('hosting.edit',$host->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{ $hosting->links() }}
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

