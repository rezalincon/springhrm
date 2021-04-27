@extends('admin.admin-layouts.master')


@section('content')

<div class="row">
    <div class="container col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Salary</h6>
            </div>
            <div class="card-body">

                <form action="{{route('admin.paymentupdate',$payroll[0]->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Salary</label>
                        <input name="salary" id="salary" class="form-control" type="text" value="{{$payroll[0]->salary}}" readonly>
                        <input name="user_id" id="salary" class="form-control" type="hidden" value="{{$payroll[0]->user_id}}" readonly>
                        <input name="id" id="sry" class="form-control" type="hidden" value="{{$payroll[0]->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">From Date</label>
                        <input name="fromdate" id="fromdate" class="form-control col-md-5" type="text" value="{{$payroll[0]->fromdate}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Till date</label>
                        <input name="todate" id="todate" class="form-control" type="text" value="{{$payroll[0]->todate}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Deduction</label>
                        <input name="deduction" id="deduction" value="{{$payroll[0]->deduction}}" class="form-control deduction" type="text" >
                        <input name="attendance_count" value=""  class="form-control deduction" type="hidden" >
                    </div>
                    <div class="form-group">
                        <label for="">Bonus</label>
                        <input name="bonus" id="bonus" value="{{$payroll[0]->bonus}}" class="form-control bonus" type="text" >
                    </div>

                    <div class="form-group">
                        <label for="">Comment</label>
                        <input name="comment" id="comment" value="{{$payroll[0]->comment}}" class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input name="total" value="{{$payroll[0]->total_salary}}" id="total" class="form-control total" type="text" readonly>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="approve_key" type="checkbox" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Pending
                        </label>
                      </div>

                    <div class="form-group">
                        <input name="submit" class="btn btn-block btn-info" type="submit" >
                    </div>
                  </form>



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
