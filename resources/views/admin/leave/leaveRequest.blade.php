@extends('admin.admin-layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Leave Request</h6>
        </div>
        <div class="card-body">

            <div class="row">

                <div >
                    <table class="table table-bordered dt-responsive" id="AdminLeaveRequestDT" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Leave Type </th>
                            <th>Leave From</th>
                            <th>Leave To</th>
                            <th>Reason</th>
                            <th>Status</th>
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

<!-- /.container-fluid -->

<!-- Approve Leave -->
<div id="approve_LeaveRequest_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve Leave request</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="leaveRequestID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="approveLeaveRequest" class="btn btn-block btn-info" type="submit" value="Approve">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Decline Leave -->
<div id="decline_LeaveRequest_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Decline Leave request</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="leaveRequestID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="declineLeaveRequest" class="btn btn-block btn-info" type="submit" value="Decline">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
