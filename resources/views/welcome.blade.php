<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <title>@yield('title')</title>--}}

<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <style>
        .bx{
            /*width: 190px;*/
            /*height: 170px;*/
            text-align: center;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .5s;
            padding: 50px;
            /*margin-left: 30px;*/
            /*margin-top: 10px;*/
        }
        .bx:hover{
            background-color: #25252d;
            opacity: 1;
        }
        .lightGreen{
            background-color: #5fcd72;
            cursor: pointer;
        }
        .lightBlue{
            background-color: #3598db;
            cursor: pointer;
        }
        .lightGolden{
            background-color: #f39d2d;
            cursor: pointer;
        }
        .lightRed{
            background-color: #e84c3c;
            cursor: pointer;
        }
        .lightGray{
            background-color: #34495e;
            cursor: pointer;
        }
        .skyBlue{
            background-color: #4ebd9c;
            cursor: pointer;
        }
        .purple{
            background-color: #9b59b6;
            cursor: pointer;
        }
        .gray{
            background-color: #95a5a6;
            cursor: pointer;
        }
        .bx .icon{
            font-size: 65px;
        }
        .icon i{
            color: white;
        }
        .boxText{
            color: white;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    <!-- Navbar -->
@include('includes.top-nav')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
        <section class="content" >
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <div class="bx lightGreen">
                                <a href="{{url('admin/domain-hosting')}}">
                                    <div class="icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Domain & Hosting')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx lightBlue">
                                <a href="{{url('admin/employee')}}">
                                    <div class="icon">
                                        <i class="fas fa-user-clock"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('HRM')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx lightGolden">
                                <a href="{{url('admin/shift')}}">
                                    <div class="icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Office Setup')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx lightRed">
                                <a href="{{url('admin/leave-category')}}">
                                    <div class="icon">
                                        <i class="fas fa-calendar-week"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Leave Management')}}</b></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <div class="bx purple">
                                <a href="{{url('admin/attendance-status')}}">
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Attendance Management')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx lightGray">
                                <a href="{{url('admin/coa')}}">
                                    <div class="icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Accounts')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx gray">
                                <a href="{{url('admin/role')}}">
                                    <div class="icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('User Management')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx skyBlue">
                                <a href="{{url('admin/religion')}}">
                                    <div class="icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('Settings')}}</b></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="bx skyBlue">
                                <a href="{{url('admin/religion')}}">
                                    <div class="icon">
                                        <i class="fas fa-sms"></i>
                                    </div>
                                    <div class="boxText"><b>{{__('SMS Gateway')}}</b></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- /.content-wrapper -->

@include('includes.footer')

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
<!-- select 2 -->
<script src="{{ asset('lte/plugins/select2/js/select2.min.js') }}"></script>


@yield('script')
</body>

</html>
