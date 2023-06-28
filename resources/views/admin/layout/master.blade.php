<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('dashboard/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('dashboard/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('dashboard/css/themify-icons.css') }}" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

    <script src="{{ asset('dashboard/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>

{{--    <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->--}}
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('dashboard/js/sweetalert2.js') }}"></script>

    <!-- Promise Library for SweetAlert2 working on IE -->
    <script src="{{ asset('dashboard/js/es6-promise-auto.min.js') }}"></script>

</head>

<body>

<div class="wrapper">
    @include('admin.layout.sidebar')
    <div class="main-panel">
        @include('admin.layout.header')
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @yield('content')

                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</div>


</body>
@yield('script')

<!--  Forms Validations Plugin -->
<script src="{{ asset('dashboard/js/jquery.validate.min.js') }}"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('dashboard/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ asset('dashboard/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('dashboard/js/bootstrap-selectpicker.js') }}"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ asset('dashboard/js/bootstrap-switch-tags.js') }}"></script>

<!-- Circle Percentage-chart -->
<script src="{{ asset('dashboard/js/jquery.easypiechart.min.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('dashboard/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('dashboard/js/bootstrap-notify.js') }}"></script>


<!-- Vector Map plugin -->
<script src="{{ asset('dashboard/js/jquery-jvectormap.js') }}"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Wizard Plugin    -->
<script src="{{ asset('dashboard/js/jquery.bootstrap.wizard.min.js') }}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('dashboard/js/bootstrap-table.js') }}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('dashboard/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{ asset('dashboard/js/fullcalendar.min.js') }}"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('dashboard/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('dashboard/js/demo.js') }}"></script>

</html>
