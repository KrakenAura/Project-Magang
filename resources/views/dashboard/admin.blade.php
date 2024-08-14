@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection

@section('content')

<body class="hold-transition sidebar-mini ">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('images/logo tvd.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <h1>Website Analytics</h1>
    <div class="chart-section">
        <div style="width: 33.33%; float: left;" class="chart">
            <canvas id="barChartToday" width="400" height="400"></canvas>
        </div>
        <div style="width: 33.33%; float: left;" class="chart">
            <canvas id="barChartWeekly" width="400" height="400"></canvas>
        </div>
        <div style="width: 33.33%; float: left;" class="chart">
            <canvas id="barChartMonthly" width="400" height="400"></canvas>
        </div>
    </div>
    <div class="popular-news">
        <h3>Most Popular News</h3>
        @foreach ($categories as $category)
        <h2>{{ $category }}</h2>
        <div class="news-container">
            @foreach ($popularNews[$category] as $news)
            <div class="card galery-card">
                <div class="card-image">
                    <img src="{{ asset('storage/'.$news->image) }}">
                </div>
                <div class="card-desc">
                    <h4>{{ $news->title }}</h4>
                    <p>Penulis: {{ $news->author }}</p>
                    <p>Dilihat: {{ $news->views }} kali</p>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>


    <aside class="control-sidebar control-sidebar-dark">
    </aside>

    @section('scripts')
    <script>
        console.log('Today\'s Page Views:', <?php echo json_encode($todayPageViews); ?>);
        console.log('Last Week\'s Page Views:', <?php echo json_encode($lastWeekPageViews); ?>);
        console.log('Last Month\'s Page Views:', <?php echo json_encode($lastMonthPageViews); ?>);
    </script>
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
    @endsection