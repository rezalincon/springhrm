@extends('employee.employee-layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attendance Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">employee</a></li>
                        <li class="breadcrumb-item active">attendanceform</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Fill the form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->




            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                       
                        
                    </div>
                    <div class="row ml-3 mt-5">
                        
                        <h5>Current IP : {{$a}}</h5><br>
                        @if (session('failed'))
                        <div class="alert alert-danger ml-4 col-md-12">
                         {{session('failed')}}
                        </div>
                         @endif
                         
                        @if (session('success'))
                        <div class="alert alert-success ml-4 col-md-12">
                         {{session('success')}}
                        </div>
                         @endif
                    </div>
                    <div class="row ml-3 mb-5 mt-4">
                        <div class="col-md-5">
                            <form action="{{route('employee.attendancestore')}}"  method="post" >
                                @csrf
                                    <input type="hidden" value="{{$a}}" name="timein_ip">
                                    <button type="submit" class="btn btn-success ">Time In</button>
                                 </form>
                        </div>
                        <div class="col-md-5">
                            <form action="{{route('employee.attendanceupdate')}}"  method="post" >
                                @csrf
                               
                                     <input type="hidden" value="{{$a}}" name="timeout_ip">
                                    <button type="submit" class="btn btn-danger ">Time Out</button>
                          
                            </form>
                        </div>
                        <main class="main">
                            <div class="clockbox">
                                <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 600 600">
                                    <g id="face">
                                        <circle class="circle" cx="300" cy="300" r="253.9"/>
                                        <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"/>
                                        <circle class="mid-circle" cx="300" cy="300" r="16.2"/>
                                    </g>
                                    <g id="hour">
                                        <path class="hour-arm" d="M300.5 298V142"/>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                                    </g>
                                    <g id="minute">
                                        <path class="minute-arm" d="M300.5 298V67"/>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                                    </g>
                                    <g id="second">
                                        <path class="second-arm" d="M300.5 350V55"/>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                                    </g>
                                </svg>
                            </div><!-- .clockbox -->
                        </main>
                    </div>
                   
                </div>
                
            </div>
           
           
        </div>
    </div>
    <!-- /.card -->

    <style>
        /* Layout */
.main {
    display: flex;
    padding: 2em;
    height: 90vh;
    justify-content: center;
    align-items: middle;
}

.clockbox,
#clock {
    width: 100%;
}

/* Clock styles */
.circle {
    fill: none;
    stroke: #000;
    stroke-width: 9;
    stroke-miterlimit: 10;
}

.mid-circle {
    fill: #000;
}
.hour-marks {
    fill: none;
    stroke: #000;
    stroke-width: 9;
    stroke-miterlimit: 10;
}

.hour-arm {
    fill: none;
    stroke: #000;
    stroke-width: 17;
    stroke-miterlimit: 10;
}

.minute-arm {
    fill: none;
    stroke: #000;
    stroke-width: 11;
    stroke-miterlimit: 10;
}

.second-arm {
    fill: none;
    stroke: #000;
    stroke-width: 4;
    stroke-miterlimit: 10;
}

/* Transparent box ensuring arms center properly. */
.sizing-box {
    fill: none;
}

/* Make all arms rotate around the same center point. */
/* Optional: Use transition for animation. */
#hour,
#minute,
#second {
    transform-origin: 300px 300px;
    transition: transform .5s ease-in-out;
}

    </style>


    <script async> const HOURHAND = document.querySelector("#hour");
        const MINUTEHAND = document.querySelector("#minute");
        
        const SECONDHAND = document.querySelector("#second");
        
        var date = new Date();
        console.log(date);
        let hr = date.getHours();
        let min = date.getMinutes();
        let sec = date.getSeconds();
        console.log("Hour: " + hr + " Minute: " + min + " Second: " + sec);
        
        let hrPosition = (hr*360/12) + (min*(360/60)/12);
        let minPosition = (min*360/60 )+ (sec*(360/60)/60);
        let secPosition = sec*360/60;
        
        function runThetime() {
            hrPosition = hrPosition+(3/360);
            minPosition = minPosition+(6/60);
            secPosition = secPosition+(6);
        
        HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
        MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
        SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
        }
        
        var interval = setInterval(runThetime, 1000);</script>
@endsection
