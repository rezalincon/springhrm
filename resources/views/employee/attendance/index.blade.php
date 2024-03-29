@extends('employee.employee-layouts.master')

@section('content')
<div class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Attendance log</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">attendance</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Attendance Log</h6>
        </div>
        <div class="card-body">

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Worked Hours</th>
                        <th>Timein Status</th>
                        <th>Timeout Status</th>
                        <th>Timein IP</th>
                        <th>TimeOut IP</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Worked Hours</th>
                        <th>Timein Status</th>
                        <th>Timeout Status</th>
                        <th>Timein IP</th>
                        <th>TimeOut IP</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($attendance as $atd)


                        <tr>
                            <th>{{$atd->date}}</th>
                            <th>{{$atd->timein}}</th>
                            @if ($atd->timeout>0)
                            <th>{{$atd->timeout}}</th>
                            @else
                            <th> </th>
                            @endif


                            <th>{{$atd->workedhours}} hour </th>

                            <th>{{$atd->timein_status}}</th>
                            <th>{{$atd->timeout_status}}</th>
                            <th>{{$atd->timein_ip}}</th>
                            @if ($atd->timeout_ip>0)
                            <th>{{$atd->timeout_ip}}</th>
                            @else
                            <th> </th>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
