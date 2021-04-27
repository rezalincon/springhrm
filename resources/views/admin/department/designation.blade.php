@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Designation List</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%; margin-bottom:20px;">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_designation_modal" style="float: right;">Add Designation</a>
                    </div>
                    <div style="width: 100%">
                        <table class="table table-bordered " id="designationDT" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>designation Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    <div id="add_designation_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add designation</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">designation Name</label>
                            <input name="designation_name" class="form-control" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <input id="adddesignation" class="btn btn-block btn-info" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete designation-->
<div id="delete_designation_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete designation</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <input type="hidden" name="designationID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deletedesignation" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- /.Edit LeaveType type -->

   <div id="edit_designation_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit designation</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="designationID">
                        <input name="designation_nameEdit" class="form-control" type="text" placeholder="">
                    </div>

                    <div class="form-group">
                        <input id="editdesignation" class="btn btn-block btn-info" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


