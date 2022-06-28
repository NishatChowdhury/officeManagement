@extends('admin.account-management.layouts.master')

@section('title','Settings | Chart Of Accounts')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Chart of Accounts') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Chart of Accounts') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        {{ Form::text('q',null,['class'=>'form-control','id'=>'q','placeholder'=>__('Enter COA Name')]) }}
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><span class="fas fa-search"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('coa.create') }}" class="btn btn-info"> <i class="fas fa-plus-circle"></i> {{ __('New') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <table id="coa_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Parent') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody id="list">
                                @php $x = 1 @endphp
                                @foreach($chartOfAccounts as $coa)
                                    <tr>
                                        <td>{{ $coa->code }}</td>
                                        <td class="text-right"><span class="text-secondary font-italic">{{ $coa->grandparents->name ?? '' }}</span> -> <b>{{ $coa->parents->name ?? '' }}</b></td>
                                        <td>{{ $coa->name }}</td>
                                        <td>
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" {{ $coa->is_enabled ? 'checked' : '' }} onchange="statusChange({{$coa->id}})"/>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            {!! Form::model($coa, ['route' => ['coa.destroy', $coa->id], 'method' => 'delete', 'class' => 'form-horizontal','onsubmit'=>'return confirmDelete()']) !!}

                                            <a href="{{ route('coa.edit',$coa->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-9 mt-3">
                                    <div>{{ __('Showing') }} {{ $chartOfAccounts->firstItem() }} {{ __('to') }} {{ $chartOfAccounts->lastItem() }} of {{ $chartOfAccounts->total() }} {{ __('entries') }}</div>
                                </div>
                                <div class="col-sm-12 col-md-3 mt-3">
                                    {{ $chartOfAccounts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!-- /Chart of Accounts page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
    <script>
        function statusChange(id){
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url  : '{{ route('coa.isEnabled') }}',
                data : {_token:csrf,id:id},
                type : 'post'
            }).done(function(){
                location.replace("{{ route('coa.index') }}");
            })
        }
    </script>
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
                url: "{{ route('coa.list') }}",
                data: {_token:csrf,q:q},
                type: "POST",
            }).done(function(e){
              $("#card-body").html(e);
            })
        })
    </script>
@stop

