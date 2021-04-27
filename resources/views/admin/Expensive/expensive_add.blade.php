@extends('admin.admin-layouts.master')
@section('content')

<div class="container">

<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Expense +</button>

      <!-- Data Show -->
        <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Expense Category</th>
                        <th>List_Qty_Price_Total</th>
                        <th>Total Expense</th>
                        <th>Expense Date</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach($expensives as $expense)
                  <tr>
                    <td>{{$expense->category->expense_category_name}}</td>
                    <td><?php $rows=explode(',', $expense->list_qty_price_total);?>

                   <table><thead><tr>  <th>Item</th>
                      <th>qty</th>
                      <th>Price</th>
                      <th>Total</th></tr></thead>

                    <?php

                      $row= count($rows)-2;
                      for($i=0; $i<=$row; $i++){

                        ?>
                        <tbody>
                          <tr>
                         <?php  $items=explode('_', $rows[$i]);
                           $item= count($items)-1;
                      for($a=0; $a<=$item; $a++){

                      ?>


                      <td><?php echo $items[$a]; ?></td>


                      <?php } ?>

                        </tr>
                      </tbody>

                        <?php

                      }


                     ?></table></td>
                    <td>{{$expense->total_expense}}</td>
                    <td>{{$expense->expense_date}}</td>
                    <td>{{$expense->comment}}</td>
                    <td>

                      <a href="" id="deleteExpenseId" data-id="{{$expense->id}}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                  </tr>
                 @endforeach
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection








<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Expense Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form action="" method="post" id="expense-us-form">
    {{ csrf_field() }}

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <form action="" method="POST" id="expense-us-form">
                @csrf
                <div class="form-group row">
                  <label for="input-12" class="col-sm-0 col-form-label">Manage Category</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="category_id">
                          <option>Select Paikar</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->expense_category_name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <label for="input-12" class="col-sm-0 col-form-label">Date</label>
                  <div class="col-sm-3">
                    <input type="datetime-local" class="form-control" name="expense_date" required>
                  </div>
                  <label for="input-12" class="col-sm-0 col-form-label">Comment</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="comment" required>
                  </div>
                </div>


            <table>
              <thead>
                <tr>
                  <th scope="col">Item</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                  <th scope="col"><button id="add_new" type="button" name="add_new" class="btn btn-sm btn-success">+</button></th>
                </tr>
                </thead>
                <tbody id="mainbody">
                <tr>
                  <td><input class="item" type="text" name="addmore[0][item]" required></td>
                  <td><input class="qty" type="number" name="addmore[0][qty]" id="qty0" required></td>
                  <td><input class="price" type="number" name="addmore[0][price]" id="price0" required></td>
                  <td><input   type="number" name="addmore[0][total]"  readonly="readonly" id="total0" class="total"></td>
                </tr>
                </tbody>

                <!--  -->
                <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;net total&nbsp;&nbsp;&nbsp;:</td>
                  <td><input type="number" name="total_expense" id="net" readonly="readonly" style="background: silver;" placeholder="net price"></td>
                </tr>
                </tbody>
            </table>

            <br>
            <button type="submit" name="submit" class="btn btn-sm btn-primary float-left" id="saveExpense">Save</button><br><br>
      </form>

            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end Add Modal -->


@section('scripts')

<script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );

     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

      } );

    </script>



@endsection
