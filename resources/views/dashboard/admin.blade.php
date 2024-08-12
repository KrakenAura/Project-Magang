@extends('dashboard/adminlayouts')

@section('css')

@endsection

@section('content')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{asset('images/logo tvd.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <h1>Website Analytics</h1>

            <div style="width: 33.33%; float: left;">
                <canvas id="barChartToday" width="400" height="400"></canvas>
            </div>
            <div style="width: 33.33%; float: left;">
                <canvas id="barChartWeekly" width="400" height="400"></canvas>
            </div>
            <div style="width: 33.33%; float: left;">
                <canvas id="barChartMonthly" width="400" height="400"></canvas>
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script>
        console.log('Today\'s Page Views:', <?php echo json_encode($todayPageViews); ?>);
        console.log('Last Week\'s Page Views:', <?php echo json_encode($lastWeekPageViews); ?>);
        console.log('Last Month\'s Page Views:', <?php echo json_encode($lastMonthPageViews); ?>);
    </script>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var data = <?php echo json_encode($todayPageViews); ?>;
        var lastWeekData = <?php echo json_encode($lastWeekPageViews); ?>;
        var lastMonthData = <?php echo json_encode($lastMonthPageViews); ?>;

        // Bar Chart for Today
        var ctxBarToday = document.getElementById('barChartToday').getContext('2d');
        var barChartToday = new Chart(ctxBarToday, {
            type: 'bar',
            data: {
                labels: data.map(item => item.page),
                datasets: [{
                    label: 'Today\'s Page Views',
                    data: data.map(item => item.total_views),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Bar Chart for Weekly
        var ctxBarWeekly = document.getElementById('barChartWeekly').getContext('2d');
        var barChartWeekly = new Chart(ctxBarWeekly, {
            type: 'bar',
            data: {
                labels: lastWeekData.map(item => item.page),
                datasets: [{
                    label: 'Last Week\'s Page Views',
                    data: lastWeekData.map(item => item.total_views),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Bar Chart for Monthly
        var ctxBarMonthly = document.getElementById('barChartMonthly').getContext('2d');
        var barChartMonthly = new Chart(ctxBarMonthly, {
            type: 'bar',
            data: {
                labels: lastMonthData.map(item => item.page),
                datasets: [{
                    label: 'Last Month\'s Page Views',
                    data: lastMonthData.map(item => item.total_views),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>



    @endsection