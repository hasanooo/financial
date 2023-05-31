<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titel')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("Admin/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("Admin/dist/css/adminlte.min.css")}}">
    <!-- Bootstrap -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Bootstrap Dropdown Hover CSS -->
    {{-- <link href="css/animate.min.css" rel="stylesheet"> --}}
    {{-- <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet"> --}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @include('admin.components.styles')
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.components.navbar')
        <!-- /.navbar -->

        @include('admin.components.sidebar')

        <!-- Main content -->
                @yield('content')
                
        </div>





        <!-- /.content -->

        <!-- /.content-wrapper -->

        {{-- <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar --> --}}

        <!-- Main Footer -->
        @include('admin.components.footer')

        {{-- <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar --> --}}
    </div>
    <!-- ./wrapper -->

    @include('admin.js_scripts.admin_js')
</body>

</html>
