@extends('admin.admin-layouts.master')

@section('content')
<div class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Attendance log</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">admin</a></li>
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
                        <th>User Name</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Worked Hours</th>
                        <th>Status (IN/OUT)</th>
                        <th>IP</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Worked Hours</th>
                        <th>Status (IN/OUT)</th>
                        <th>IP</th>
                    </tr>
                    </tfoot>
                    <tbody>
                   @foreach ($attendance as $atd)
                   <tr>
                         <td>{{$atd->date}}</td>
                       <td>{{$atd->name}}</td>
                       <td>{{$atd->timein}}</td>
                       <td>{{$atd->timeout}}</td>
                       <td>{{$atd->workedhours}}</td>

                       <td> 
                           @if ($atd->timein_status=='late in')
                           <p style="color: red">{{$atd->timein_status}}</p>   
  
                           @else 
                           <p style="color: green">{{$atd->timein_status}}</p>

                           @endif /  @if ($atd->timeout_status=='early out')
                           <p style="color: red">{{$atd->timeout_status}}</p>   
  
                           @else 
                           <p style="color: green">{{$atd->timeout_status}}</p>

                           @endif</td> 
                       <td>{{$atd->timein_ip}} / {{$atd->timeout_ip}}</td>
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