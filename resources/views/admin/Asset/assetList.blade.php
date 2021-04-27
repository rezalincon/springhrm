@extends('admin.admin-layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Equipment List</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">

                </div>
                <div style="width: 100%">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Equipment Name</th>
                                <th>Type Name</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($all_equipment as $equipment)
                            <tr>
                                <td>{{ $equipment -> id }}</td>
                                <td>{{ $equipment -> equipment_name }}</td>
                                <td>{{ $equipment -> asset_type }}</td>
                                <td>{{ $equipment -> model}}</td>
                                <td>{{ $equipment -> price }}</td>
                                <td>{{ $equipment -> quantity }}</td>
                                <td>{{ $equipment -> total_price }}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- container-fluid -->
<div id="delete_equipment_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Equipment</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" action="{{ route('admin.equipment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h4>Are You Sure?</h4>

                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" type="submit" value="Cancel" data-dismiss="modal">
                        <input class="btn btn-block btn-info" type="submit" value="Save">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
  $('a#delete_equipment_modal').click(function() {
  var id = $(this).data('id');
  alert(id)''
  } );
</script>




@endsection

