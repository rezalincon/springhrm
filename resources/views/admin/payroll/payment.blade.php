@extends('admin.admin-layouts.master')


@section('content')

<div class="row">
    <div class="container">
        <div class="col-md-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employee Information</h6>
                </div>
                <div class="card-body">


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col">Salary</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($emp as $e)
                    <tr>
                        <th scope="row">{{ $e->user_id }}</th>
                        <td>{{ $e->name }}</td>
                        <td>{{ $e->department }}</td>
                        <td>@if ($e->status==1)
                                        Active
                                @endif
                                @if ($e->status==0)
                                Deactive
                         @endif</td>
                         <td>{{ $e->salary }}</td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row">
    <div class="container">

        <div class="col-md-12">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payment Information</h6>
                </div>
                <div class="card-body">

            <table class="table table-responsive" width="100%">
                <thead>
                  <tr>
                    <th scope="col">Created Date</th>
                    <th scope="col">Monthly Salary</th>
                    <th scope="col">Deduction</th>
                    <th scope="col">Bonus</th>
                    <th scope="col">Total Salary</th>
                    <th scope="col">From Date</th>
                    <th scope="col">To Date</th>
                    <th scope="col">Approve_key</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($payroll as $p)
                    <tr>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->salary }}</td>
                        <td>{{ $p->deduction  }}</td>
                        <td>{{ $p->bonus  }}</td>
                        <td>{{ $p->total_salary  }}</td>
                        <td>{{ $p->fromdate  }}</td>
                        <td>{{ $p->enddate  }}</td>
                        <td>@if ($p->approve_key == 1)
                            Pending
                        @else
                            Done
                        @endif</td>
                        <td>{{ $p->comment  }}</td>
                        <td><a href="{{ route('admin.paymentedit',$e->id) }}" class="btn btn-sm btn-success">edit</a>
                            <a href="/admin/payment/delete/{{$p->id}}/{{$p->user_id}}" class="btn btn-sm btn-danger">delete</a>
                        </td>

                    </tr>

                    @endforeach



                </tbody>
              </table>
                </div>
            </div>




        </div>
    </div>
</div>

<div class="row">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h6>Filter Date</h6>
                        <form action="{{ route('admin.filterbydate',$e->id) }}" method="post">
                            @csrf
                            <div class="form-group">

                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="fromdate" id="f" required/>

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="todate" id="f" required/>

                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-sm" name="submit" placeholder="filter">
                        </form>



                            <div class="table-responsive">
                            <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>Worked Hours</th>

                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($attendance as $atd)
                                    <tr>
                                          <td>{{$atd->date}}</td>
                                        <td>{{$atd->name}}</td>
                                        <td>{{$atd->timein}}</td>
                                        <td>{{$atd->timeout}}</td>
                                        <td>{{$atd->workedhours}}</td>


                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <h6>Attendance Days Information</h6>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">From Date</th>
                                <th scope="col">Till Date</th>
                                <th scope="col">Days</th>
                                <th scope="col">Salary</th>

                              </tr>
                            </thead>
                            <tbody>
                                <td>@if( session()->has('from'))
                                    {{  session('from') }}
                                    @else
                                    N/A
                                    @endif</td>
                                <td>@if (Session::has('to'))
                                    {{ Session::get('to') }}
                                @else
                                    N/A
                                @endif</td>
                                <td>{{ count($attendance) }}</td>
                                <td>{{ $e->salary }}</td>


                            </tbody>
                          </table>

                          <h6>Add Salary</h6>

                          <form action="{{ route('admin.pay',$e->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Salary</label>
                                <input name="salary" id="salary" class="form-control" type="text" value="{{ $e->salary }}" readonly>
                                <input name="user_id" id="salary" class="form-control" type="hidden" value="{{ $e->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">From Date</label>
                                <input name="fromdate" id="fromdate" class="form-control col-md-5" type="text" value="@if(session()->has('from')){{session('from')}} @endif" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Till date</label>
                                <input name="todate" id="todate" class="form-control" type="text" value="@if(session()->has('from')){{session('from')}} @endif" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Deduction</label>
                                <input name="deduction" id="deduction" class="form-control deduction" type="text" >
                                <input name="attendance_count" value="{{ count($attendance) }}"  class="form-control deduction" type="hidden" >
                            </div>
                            <div class="form-group">
                                <label for="">Bonus</label>
                                <input name="bonus" id="bonus" class="form-control bonus" type="text" >
                            </div>

                            <div class="form-group">
                                <label for="">Comment</label>
                                <input name="comment" id="comment" class="form-control" type="text" >
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input name="total" id="total" class="form-control total" type="text" readonly>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="approve_key" type="checkbox" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Pending
                                </label>
                              </div>

                            <div class="form-group">
                                <input id="payment" class="btn btn-block btn-info" type="submit" value="pay">
                            </div>
                          </form>
                    </div>
                </div>
            </div>

        </div>














</div>
</div>


<script>
    $(function(){

function nettotalfind(){
      var sum = 0;
        $('.total').each(function()
        {
            sum += parseFloat($(this).val());
        });
        /*alert(sum);*/
          $('#total').val(sum);

    }

      $(document).on("keyup", ".deduction", function(arg){



    console.log('yyyyyy')
          var deduction=$('#deduction').val();
          var bonus=$('#bonus').val();
          console.log(deduction);
          var salary=$('#salary').val();
          console.log(salary);
          var total= +bonus + +salary - deduction  ;
          console.log(total);
          $('#total').val(total);
          nettotalfind();


      });
  $(document).on("keyup", ".bonus", function(arg){


    console.log('yyyyyy')
          var deduction=$('#deduction').val();
          var bonus=$('#bonus').val();
          console.log(deduction);
          var salary=$('#salary').val();
          console.log(salary);
          var total= +bonus + +salary - deduction  ;
          console.log(total);
          $('#total').val(total);
          nettotalfind();
  });

    })
</script>


@endsection
