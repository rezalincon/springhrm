@extends('admin.admin-layouts.master')
@section('content')
<div class="container">


<h4>Income Management</h4>
<div class="container">
<button class="btn btn-outline-warning float-right" data-toggle="" style="margin-top:7px;"data-target="">Report
</button>
<button type="button" class="btn btn-info mb-4 mt-2" data-toggle="modal" data-target="#addModal">
 Add Income +
</button> <br>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-scrollable" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalScrollableTitle">Income Form</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">

      <form action="" method="POST" id="income-us-form">
          @csrf
         <div class="form-group">
           <label class="col-form-label">Title:</label>
           <input type="text" class="form-control" name="title" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">File Book Holder:</label>
           <input type="text" class="form-control" name="file_book_holder" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Memo No:</label>
           <input type="text" class="form-control" name="memo_no" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Client Name:</label>
           <input type="text" class="form-control" name="client_name" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Client Type:</label>
           <input type="text" class="form-control" name="client_type" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Payment By:</label>
           <input type="text" class="form-control" name="payment_by" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Transection Id:</label>
           <input type="number" class="form-control" name="transection_id" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Date:</label>
           <input type="date" class="form-control" name="date" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Quantity:</label>
           <input type="number" class="form-control" id="qty" name="quantity" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Price:</label>
           <input type="number" class="form-control" id="price" name="price" required>
         </div>
         <div class="form-group">
           <label class="col-form-label">Total Price:</label>
           <input type="number" class="form-control" id="total" name="total_price">
         </div>
         <div class="form-group">
           <label class="col-form-label">Received By:</label>
           <input type="text" class="form-control" name="received_by" required>
         </div>

     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       <button type="submit" name="submit" class="btn btn-primary" id="saveIncome">Save</button>
     </div>
     </form>

   </div>
 </div>
</div>
<!-- end Add Modal -->


<!-- Data Show -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Income List</h6>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                  <table id="default-datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>File Holder</th>
                            <th>Memo No</th>
                            <th>Client Name</th>
                            <th>Client Type</th>
                            <th>Payment By</th>
                            <th>Transection</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Received By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($incomes as $incom)
                      <tr>
                        <td>{{$incom->title}}</td>
                        <td>{{$incom->file_book_holder}}</td>
                        <td>{{$incom->memo_no}}</td>
                        <td>{{$incom->client_name}}</td>
                        <td>{{$incom->client_type}}</td>
                        <td>{{$incom->payment_by}}</td>
                        <td>{{$incom->transection_id}}</td>
                        <td>{{$incom->date}}</td>
                        <td>{{$incom->quantity}}</td>
                        <td>{{$incom->price}}</td>
                        <td>{{$incom->total_price}}</td>
                        <td>{{$incom->received_by}}</td>
                        <td>
                            <a href="{{ url('/income/views/') }}" data-id="{{$incom->id}}" id="viewId"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewModal">view</a><br>

                            <a href="" data-id="{{$incom->id}}" id="delIncomeId"  class="btn btn-sm btn-danger mt-1">delete</a>

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
</div>

     </div><!-- End Row-->









<!-- 3rd Modal for view -->
<div class="modal fade"  id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="Clientname"></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>

     <div class="modal-body">
       <table class="table">
   <tbody>
     <tr>
       <td><div class="Ititle"></div></td>
     </tr>
     <tr>
       <td><div class="Ifile_book_holder"></div></td>
     </tr>
     <tr>
       <td><div class="Imemo_no"></div></td>
     </tr>
     <tr>
       <td><div class="Iclient_name"></div></td>
     </tr>
     <tr>
       <td><div class="Iclient_type"></div></td>
     </tr>
     <tr>
       <td><div class="Ipayment_by"></div></td>
     </tr>
     <tr>
       <td><div class="Idate"></div></td>
     </tr>
     <tr>
       <td><div class="Iprice"></div></td>
     </tr>
     <tr>
       <td><div class="Itotal_price"></div></td>
     </tr>
     <tr>
       <td><div class="Ireceived_by"></div></td>
     </tr>
   </tbody>
 </table>












   </div>

     <div class="modal-footer">
       <button type="submit" onClick="window.print()"  name="submit" value="submit" class="btn btn-sm btn-primary" id="submitStudent">print</button>
     </div>
   </div>
 </div>
</div>

</div>

<!-- end of view -->
@endsection

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






