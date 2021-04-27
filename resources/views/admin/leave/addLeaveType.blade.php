@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Leave Type</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card-header" style="width:100%; margin-bottom:20px;">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_LeaveType_modal" style="float: right;">Add Leave Type</a>
                    </div>
                    <div style="width: 100%">
                        <table class="table table-bordered " id="leaveTypeDT" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Leave Type</th>
                                <th>Total Leave Days</th>
                                <th>Percalender</th>
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

    <div id="add_LeaveType_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Leave type</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="leave_type" class="form-control" type="text" placeholder="Leave Type">
                        </div>
                        <div class="form-group">
                            <input name="total_leave_days" class="form-control" type="number" placeholder="Total Leave Days">
                        </div>
                        <div class="form-group">
                            <select name="percalender" id="percalender" class="form-control">
                            <option>-select-</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="addLeaveType" class="btn btn-block btn-info" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Leave type -->
<div id="delete_LeaveType_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Leave Type</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <input type="hidden" name="leaveTypeID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteLeaveType" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- /.Edit LeaveType type -->

   <div id="edit_LeaveType_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit equipment</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="leaveTypeID">
                        <input name="leave_typeEdit" class="form-control" type="text" placeholder="Leave Type">
                    </div>
                    <div class="form-group">
                        <input name="total_leave_daysEdit" class="form-control" type="text" placeholder="Total Leave Days">
                    </div>
                    <div class="form-group">
                        <select name="percalenderEdit" id="percalenderEdit" class="form-control">
                        <option>-select-</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input id="editLeaveType" class="btn btn-block btn-info" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


