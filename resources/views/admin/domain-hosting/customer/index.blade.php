@extends('admin.domain-hosting.layouts.master')

@section('title','Customer')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Customers')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Customers')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="mx-auto pull-right">
                                        <div class="input-group mb-3">
                                            {{ Form::text('q',null,['class'=>'form-control','id'=>'q','placeholder'=>__('Enter Customer Name')]) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><span class="fas fa-search"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                        <a href="{{ url('admin/customer/create') }}" class="btn btn-info "style="margin-left: 10px;"><i class="fas fa-plus-circle"></i> {{__('New')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Address') }}</th>
                                        <th>{{ __('Mobile') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Contact Person') }}</th>
                                        <th>{{ __('Contact Person Phone') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $key => $customer)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->mobile }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->contact_person }}</td>
                                            <td>{{ $customer->contact_person_phone }}</td>
                                            <td>
                                                {{ Form::open(['url'=>['admin/customer',$customer->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $customers->links() }}
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

    <script>
        $("#q").keyup(function(){
            var q = $(this).val();
            var csrf = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ route('customer.search') }}",
                data: {_token:csrf,q:q},
                type: "POST",
            }).done(function(e){
                $("#card-body").html(e);
            })
        })
    </script>
@stop

