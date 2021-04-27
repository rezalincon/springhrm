@extends('admin.admin-layouts.master')

@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> <h1 class="h3 mb-0 text-gray-800">Welcome {{Auth::user()->name}} ({{Auth::user()->id}})</h1>

        </div>


        {{-- <div class="row mb-4">

            <div class="container">
                <a href="{{route('admin.attendancestore')}}" class="btn btn-md btn-primary ml-2">Attendance</a>
                <a href="{{route('admin.event')}}" class="btn btn-md btn-secondary ml-2">Event</a>
                <a href="{{route('admin.addpayroll')}}" class="btn btn-md btn-warning ml-2">Payroll</a>
            </div>

        </div> --}}


        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Earnings </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tk : {{$totalin}}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-coins fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Expense </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tk : {{$totalex}}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-dollar-sign fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Profit </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tk : {{$totalprofit}}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-search-dollar fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Asset </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{count($asset)}}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-file fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">On Going Projects
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($totalpro)}}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-tasks fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Employee
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($totalemp)}}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-users fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Projects
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($tpro)}}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-clipboard-list fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($ttask)}}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-list-ol fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">Active Workers</h6>
                        <div class="dropdown no-arrow">


                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>

                                    <th>Name</th>
                                   <th>Role</th>
                                    <th>status</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                   @foreach ($activeuser as $atd)
                                       <tr>
                                           <td>{{$atd->name}}</td>
                                           <td>{{$atd->role}}</td>
                                           <td><p style="color: green">working</p></td>
                                       </tr>
                                   @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">Employee Status</h6>
                        <div class="dropdown no-arrow">


                        </div>
                    </div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load("current", {packages:["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],

                          ['offline',    <?php echo $check ?>],
                          ['working',    <?php echo count($activeuser) ?>]
                        ]);

                        var options = {
                          title: '',
                          legend: 'none',
                          pieSliceText: 'value',
                          colors: ['#8B008B','#008000'],
                          pieHole: 0.3,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                      }
                    </script>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <div id="donutchart" style="width: 270px; height: 246px; "></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          <?php

          ?>
          ['2021',  {{$totalin}},      {{$totalex}}],


        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info align-middle">Illustrations</h6>
                    </div>
                    <div class="card-body">


                      <div id="curve_chart" style="width: 970px; height: 500px; margin-left: 5%;"></div>


                    </div>



                </div>













                <!-- Approach -->

            </div>


        </div>


    </div>


    <!-- /.container-fluid -->

@endsection
