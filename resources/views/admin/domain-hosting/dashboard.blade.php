@extends('admin.domain-hosting.layouts.master')

@section('title','Settings | Domain-Hosting')

@section('content')
    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">{{__('Customer Domains')}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example2" class="table">
                                    <thead>
                                    <tr>
                                        <th>{{__('Sl') }}</th>
                                        <th>{{__('Name') }}</th>
                                        <th>{{__('Exp. Date') }}</th>
                                        <th>{{__('Provider') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $key => $customer)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $customer->domain->name }}</td>
                                            <td>{{ $customer->expire_date }}</td>
                                            <td>{{ $customer->domain->provider->name ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Hosting')}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Domain') }}</th>
                                        <th>{{ __('Exp. Date') }}</th>
                                        <th>{{ __('Provider') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hosting as $key => $host)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $host->name }}</td>
                                        <td>{{ $host->expire_date }}</td>
                                        <td>{{ $host->provider->name ?? '' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card card-primary">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">{{__('Hostings')}}</h3>--}}

{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false">--}}
{{--                                    <i class="fas fa-sync-alt"></i>--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="maximize">--}}
{{--                                    <i class="fas fa-expand"></i>--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-tools -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <table id="example2" class="table table-bordered table-hover table-responsive">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>{{ __('Sl') }}</th>--}}
{{--                                        <th>{{ __('Name') }}</th>--}}
{{--                                        <th>{{ __('provider') }}</th>--}}
{{--                                        <th>{{ __('Amount') }}</th>--}}
{{--                                        <th>{{ __('Reg. Date') }}</th>--}}
{{--                                        <th>{{ __('Exp. Date') }}</th>--}}
{{--                                        <th>{{ __('Action') }}</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($hosting as $key => $host)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key+1 }}</td>--}}
{{--                                        <td>{{ $host->name }}</td>--}}
{{--                                        <td>{{ $host->provider->name }}</td>--}}
{{--                                        <td>{{ $host->amount }}</td>--}}
{{--                                        <td>{{ $host->registration_date }}</td>--}}
{{--                                        <td>{{ $host->expire_date }}</td>--}}
{{--                                        <td>--}}
{{--                                            {{ Form::open(['url'=>['admin/hosting',$host->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}--}}
{{--                                            <a href="{{ route('hosting.edit',$host->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>--}}
{{--                                            {{ Form::close() }}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}

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

