<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <!-- heder start -->
    @include('admin.include.header')
    <!-- heder end -->
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
          @include('admin.include.top_bar')
        <!-- End top bar Navigation -->

        <!-- Left Sidebar -->
          @include('admin.include.sidebar')
        <!-- End Sidebar -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">  
                
               @yield('content')

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

         <!-- start footer -->
          @include('admin.include.footer')
         <!-- end footer -->

        <script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/detect.js')}}"></script>
        <script src="{{asset('admin/assets/js/fastclick.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.nicescroll.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="{{asset('admin/assets/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>

    <!-- Counter-Up-->
    <script src="{{asset('admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- dataTabled data -->
    <script src="{{asset('admin/assets/data/data_datatables.js')}}"></script>

    <!-- Charts data -->
    <script src="{{asset('admin/assets/data/data_charts_dashboard.js')}}"></script>
    <script>
        $(document).on('ready', function() {
            // data-tables
            
   

            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
    </script>
    <!-- END Java Script for this page -->

</body>

</html>