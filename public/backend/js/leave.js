(function($) {
    $(document).ready(function() {


        //alert("enter to leave.js");
        let employee_id = $("input[name=employee_id]").val();
        //alert('/employee/LeaveRequestTable/' + employee_id);
        //alert(employee_id);
        /**
         * Admin Leave Type
         */
        var tableLoadLeaveType = $('#leaveTypeDT').DataTable({
            ajax: '/admin/LeaveTypeTable',
            columns: [
                { "data": "id" },
                { "data": "leavetype" },
                { "data": "limit" },
                { "data": "percalendar" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editLeaveTypeModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteLeaveTypeModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });

        $(document).on('click', '#addLeaveType', function(e) {
            e.preventDefault();

            let leave_type = $("input[name=leave_type]").val();
            let percalender = $('#percalender').val();
            let total_leave_days = $("input[name=total_leave_days]").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/add-leaveType',
                method: 'POST',
                data: {
                    'leave_type': leave_type,
                    'percalender': percalender,
                    'total_leave_days': total_leave_days
                },
                dataType: "json",
                success: function(response) {
                    $('#add_LeaveType_modal').modal('hide');
                    tableLoadLeaveType.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


        //Admin Delete Leave Type
        $(document).on('click', 'a#deleteLeaveTypeModal', function(e) {
            e.preventDefault();
            $('#delete_LeaveType_modal').modal('show');
            let leaveTypeID = $(this).attr('data-id');
            $('#delete_LeaveType_modal input[name="leaveTypeID"]').val(leaveTypeID);
            //alert(leaveTypeID);

        });

        $(document).on('click', '#deleteLeaveType', function(e) {
            e.preventDefault();
            let leaveTypeID = $('#delete_LeaveType_modal input[name="leaveTypeID"]').val();
            //alert(leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/delete-leaveType/' + leaveTypeID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_LeaveType_modal').modal('hide');
                    tableLoadLeaveType.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


        //Admin Edit Type
        $(document).on('click', 'a#editLeaveTypeModal', function(e) {
            e.preventDefault();
            $('#edit_LeaveType_modal').modal('show');
            let leaveTypeID = $(this).attr('data-id');
            $('#edit_LeaveType_modal input[name="leaveTypeID"]').val(leaveTypeID);

            //alert(leaveRequestID);
            $.ajax({
                url: '/admin/edit-LeaveType/' + leaveTypeID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $("#percalenderEdit").val(data.percalendar).change();;
                    $('#edit_LeaveType_modal input[name="leave_typeEdit"]').val(data.leavetype);
                    $('#edit_LeaveType_modal input[name="total_leave_daysEdit"]').val(data.limit);


                    $('#edit_leaveRequest_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editLeaveType', function(e) {
            e.preventDefault();

            let leaveTypeID = $('#edit_LeaveType_modal input[name="leaveTypeID"]').val();

            let leave_type = $("#edit_LeaveType_modal input[name=leave_typeEdit]").val();
            let percalender = $('#percalenderEdit').val();
            let total_leave_days = $("#edit_LeaveType_modal input[name=total_leave_daysEdit]").val();

            //alert(percalender);

            //alert('/employee/edit-LeaveRequest/' + leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/edit-LeaveType/' + leaveTypeID,
                method: 'POST',
                data: {
                    'leaveTypeID': leaveTypeID,
                    'leave_type': leave_type,
                    'percalender': percalender,
                    'total_leave_days': total_leave_days
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_LeaveType_modal').modal('hide');
                    tableLoadLeaveType.ajax.reload();

                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });














        /**
         * Admin Leave Request
         */
        var tableLoadLeaveRequest = $('#AdminLeaveRequestDT').DataTable({
            ajax: '/admin/LeaveRequestTable',
            columns: [
                { "data": "id" },
                { "data": "employee" },
                { "data": "type" },
                { "data": "leavefrom" },
                { "data": "leaveto" },
                { "data": "reason" },
                { "data": "status" },

                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="approveLeaveRequestModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-check" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="declineLeaveRequestModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });

        //Admin Approve

        $(document).on('click', 'a#approveLeaveRequestModal', function(e) {
            e.preventDefault();
            $('#approve_LeaveRequest_modal').modal('show');
            let leaveRequestID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#approve_LeaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#approveLeaveRequest', function(e) {
            e.preventDefault();
            let leaveRequestID = $('#approve_LeaveRequest_modal input[name="leaveRequestID"]').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/approve-LeaveRequest/' + leaveRequestID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#approve_LeaveRequest_modal').modal('hide');
                    //tableLoadLeaveRequest.ajax.reload();
                    $('#AdminLeaveRequestDT').DataTable().ajax.reload()
                        //tableLoadLeaveRequest.ajax.reload();
                        //alert("approved");
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        //Admin decline
        $(document).on('click', 'a#declineLeaveRequestModal', function(e) {
            e.preventDefault();
            $('#decline_LeaveRequest_modal').modal('show');
            let leaveRequestID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#decline_LeaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#declineLeaveRequest', function(e) {
            e.preventDefault();
            let leaveRequestID = $('#decline_LeaveRequest_modal input[name="leaveRequestID"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/decline-LeaveRequest/' + leaveRequestID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#decline_LeaveRequest_modal').modal('hide');
                    //tableLoadLeaveRequest.ajax.reload();
                    $('#AdminLeaveRequestDT').DataTable().ajax.reload()
                        //tableLoadLeaveRequest.ajax.reload();
                        //alert("approved");
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });




        /**
         * employee Leave Requst
         */
        var tableLoadLeaveRequest = $('#EmployeeLeaveRequestDT').DataTable({
            ajax: '/employee/LeaveRequestTable/' + employee_id,
            columns: [
                { "data": "idno" },
                { "data": "type" },
                { "data": "leavefrom" },
                { "data": "leaveto" },
                { "data": "reason" },
                { "data": "status" },
                { "data": "comment" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editLeaveRequestModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteLeaveRequestModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });
        // Employee Add Leave Request
        $(document).on('click', '#addLeaveRequest', function(e) {
            e.preventDefault();
            //alert("eee");

            let employee_id = $("input[name=employee_id]").val();
            let employee_name = $("input[name=employee_name]").val();

            let leave_typeRequest = $('#leave_typeRequest').val();

            let leave_from = $("input[name=leave_from]").val();
            let leave_to = $("input[name=leave_to]").val();
            let reason = $("textarea#reason").val();

            //alert(leave_typeRequest);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/employee/add-leaveRequest',
                method: 'POST',
                data: {
                    'employee_id': employee_id,
                    'employee_name': employee_name,
                    'leave_typeRequest': leave_typeRequest,
                    'leave_from': leave_from,
                    'leave_to': leave_to,
                    'reason': reason
                },
                dataType: "json",
                success: function(response) {
                    $('#add_leaveRequest_modal').modal('hide');
                    tableLoadLeaveRequest.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        //Employee Leave Edit
        $(document).on('click', 'a#editLeaveRequestModal', function(e) {
            e.preventDefault();
            //$('#edit_asset_modal').modal('show');
            let leaveRequestID = $(this).attr('data-id');
            $('#edit_leaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);

            //alert(leaveRequestID);
            $.ajax({
                url: '/employee/edit-LeaveRequest/' + leaveRequestID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $("#leave_typeRequestedit ").val(data.type).change();;

                    $('#edit_leaveRequest_modal input[name="leave_fromedit"]').val(data.leavefrom);
                    $('#edit_leaveRequest_modal input[name="leave_toedit"]').val(data.leaveto);
                    $('#edit_leaveRequest_modal textarea[name="reasonedit"]').val(data.reason);

                    $('#edit_leaveRequest_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editLeaveRequest', function(e) {
            e.preventDefault();

            let leaveRequestID = $('#edit_leaveRequest_modal input[name="leaveRequestID"]').val();


            let employee_id = $("#edit_leaveRequest_modal input[name=employee_id]").val();
            let employee_name = $("#edit_leaveRequest_modal input[name=employee_name]").val();

            let leave_typeRequest = $('#leave_typeRequestedit').val();

            let leave_from = $("#edit_leaveRequest_modal input[name=leave_fromedit]").val();
            let leave_to = $("#edit_leaveRequest_modal input[name=leave_toedit]").val();
            let reason = $("#edit_leaveRequest_modal textarea#reasonedit").val();
            //alert('/employee/edit-LeaveRequest/' + leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/employee/edit-LeaveRequest/' + leaveRequestID,
                method: 'POST',
                data: {
                    'employee_id': employee_id,
                    'employee_name': employee_name,
                    'leave_typeRequest': leave_typeRequest,
                    'leave_from': leave_from,
                    'leave_to': leave_to,
                    'reason': reason
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_leaveRequest_modal').modal('hide');
                    tableLoadLeaveRequest.ajax.reload();

                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


        //Employee Delete Leave request
        $(document).on('click', 'a#deleteLeaveRequestModal', function(e) {
            e.preventDefault();
            $('#delete_leaveRequest_modal').modal('show');
            let leaveRequestID = $(this).attr('data-id');
            $('#delete_leaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);
            //alert(leaveRequestID);

        });

        $(document).on('click', '#deleteLeaveRequest', function(e) {
            e.preventDefault();
            let leaveRequestID = $('#delete_leaveRequest_modal input[name="leaveRequestID"]').val();
            //alert(leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/employee/delete-leaveRequest/' + leaveRequestID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_leaveRequest_modal').modal('hide');
                    tableLoadLeaveRequest.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });













































    });

})(jQuery)