@extends('employee.employee-layouts.master')

@section('content')


<div class="card " width="100%">
    <div class="container p-3">
        <h1>Tasks</h1>
    </div>

</div>

<div class="row container">

<div class="card shadow mb-4 col-md-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">To Do---<span class="badge badge-success">{{ count($b) }}</h6>
    </div>
    <div class="card-body">
        @foreach ($b as $b)


        <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$b->name}}</h5>
                <p class="card-text">{{$b->description}}</p>
                <p>Project Name : <span class="badge badge-success">{{ $b->project_name }}</span> </p>
                <p>Start Date : <span class="badge badge-success">{{ $b->startdate }}</span> </p>
                <p>End Date   : <span class="badge badge-danger">{{ $b->enddate }}</span> </p><br>
               <br> <p> priority : <span class="badge badge-warning">{{ $b->priority }}</span> </p>
              </div>
            </div>
          </div>
          @endforeach

    </div>
</div>



<div class="card shadow mb-4 col-md-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">On Going---<span class="badge badge-success">{{ count($a) }}</h6>
    </div>
    <div class="card-body">
        @foreach ($a as $a)


        <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$a->name}}</h5>
                <p class="card-text">{{$a->description}}</p>
                <p>Project Name : <span class="badge badge-success">{{ $a->project_name }}</span> </p>
                <p>Start Date : <span class="badge badge-success">{{ $a->startdate }}</span> </p>
                <p>End Date   : <span class="badge badge-danger">{{ $a->enddate }}</span> </p><br>
               <br> <p> priority : <span class="badge badge-warning">{{ $a->priority }}</span> </p>
              </div>
            </div>
          </div>
          @endforeach
    </div>
</div>



<div class="card shadow mb-4 col-md-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Completed---<span class="badge badge-success">{{ count($c) }}</h6>
    </div>
    <div class="card-body">
        @foreach ($c as $c)


        <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$c->name}}</h5>
                <p class="card-text">{{$c->description}}</p>
                <p>Project Name : <span class="badge badge-success">{{ $c->project_name }}</span> </p>
                <p>Start Date : <span class="badge badge-success">{{ $c->startdate }}</span> </p>
                <p>End Date   : <span class="badge badge-danger">{{ $c->enddate }}</span> </p><br>
               <br> <p> priority : <span class="badge badge-warning">{{ $c->priority }}</span> </p>
              </div>
            </div>
          </div>
          @endforeach
    </div>
</div>



</div>










@endsection


