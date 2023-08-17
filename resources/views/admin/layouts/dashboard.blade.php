<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titel')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- Bootstrap Dropdown Hover CSS -->
    {{-- <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
  
    <!-- Theme style -->
    <link rel="stylesheet" href="/Admin/dist/css/adminlte.min.css">
  
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
    <!-- DataTables -->
    <link rel="stylesheet" href="/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="hold-transition text-sm light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">



    <!-- Navbar -->
    @include('Admin.components.navbar')


    <!-- /.navbar -->

    @include('Admin.components.sidebar')


    <div class="content-wrapper">
        <section class="content">
            <div class="card card-primary">

                @yield('content')

            </div>

        </section>
    </div>

    <!-- Main Footer -->
    @include('Admin.components.footer')

    @include('Admin.js_scripts.admin_js')


<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
   
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
   
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
   
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break; 
    }
    @endif 
    
   </script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": true,
    //     "searching": true,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": true,
    //     "responsive": true,
    //   });
    });
  </script>

</body>

</html>