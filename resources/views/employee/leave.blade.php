@extends('employee.employee-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">



        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Leave Request</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_leaveRequest_modal" style="float: right;">Add new Request</a>
                    </div>
                    <div >
                        <table class="table table-bordered dt-responsive" id="EmployeeLeaveRequestDT" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Leave Type </th>
                                <th>Leave From</th>
                                <th>Leave To</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Coment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

            </div>
        </div>

        <!-- Content Row -->

        </div>

    </div>
    <!-- /.container-fluid -->

    <div id="add_leaveRequest_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Leave Request</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="employee_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="employee_name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Leave Type</label>
                            <select name="leave_typeRequest" id="leave_typeRequest" class="form-control">
                                <option>-select-</option>
                                @foreach($leave_Types as $leave_type)
                                <option value="{{ $leave_type->leavetype}}">{{ $leave_type->leavetype }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Leave From</label>
                            <input name="leave_from" class="form-control" type="date" placeholder="Leave From">
                        </div>
                        <div class="form-group">
                            <label for="">Leave To</label>
                            <input name="leave_to" class="form-control" type="date" placeholder="Leave To">
                        </div>
                        <div class="form-group">
                            <label for="">Reason</label>
                            <textarea id="reason" name="reason" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="addLeaveRequest" class="btn btn-block btn-info" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- delete -fluid -->
<div id="delete_leaveRequest_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Leave Request</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="leaveRequestID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteLeaveRequest" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- /.Edit leaveRequest type -->

   <div id="edit_leaveRequest_modal" class="modal fade">
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
                        <input type="hidden" name="leaveRequestID">
                        <input type="hidden" name="employee_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="employee_name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Leave Type</label>
                        <select name="leave_typeRequest" id="leave_typeRequestedit" class="form-control">
                            <option>-select-</option>
                            @foreach($leave_Types as $leave_type)
                            <option value="{{ $leave_type->leavetype}}">{{ $leave_type->leavetype }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Leave From</label>
                        <input name="leave_fromedit" class="form-control" type="date" placeholder="Leave From">
                    </div>
                    <div class="form-group">
                        <label for="">Leave To</label>
                        <input name="leave_toedit" class="form-control" type="date" placeholder="Leave To">
                    </div>
                    <div class="form-group">
                        <label for="">Reason</label>
                        <textarea id="reasonedit" name="reasonedit" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <input id="editLeaveRequest" class="btn btn-block btn-info" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection

