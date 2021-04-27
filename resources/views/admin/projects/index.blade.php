@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Work Space Name: {{ $workspace[0]->name }}</h1>
            <input type="hidden" id="workid" name="workid" value="{{  $workspace[0]->id}}">

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%">
                        <a class="btn btn-sm btn-success" data-toggle="modal" href="#add_workspace_modal" style="float: right;">Add new Project</a>
                    </div>
                    <div style="width: 100%">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="workspaceDT" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
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
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    <div id="add_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Project</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="projectform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Project Name</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Project Name" required>
                            <input name="wid" id="name" class="form-control" type="hidden" value="{{ $workspace[0]->id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input name="description" id="description" class="form-control" type="text" placeholder="Project Description" required>
                        </div>
                        <div class="form-group date">
                            <label for="">Start Date</label>
                                                <input class="form-control" id="datepicker" name="startdate" width="270" required/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap'
                            });
                        </script>
                        </div>
                        <div class="form-group">
                            <label for="">End Date</label>

                            <input id="datepickerl"  name="enddate" width="270" />
                            <script>
                                $('#datepickerl').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="">Project Budget</label>
                            <input name="budget" id="budget" class="form-control" type="number" required>
                        </div>
                        <div class="form-group">
                            <label for="">Select Employees</label>
                            <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
                            <select id="choices-multiple-remove-button" placeholder="Select Employees" name="user_id[]" multiple>
                                @foreach ($emp as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                @endforeach



                            </select>
                            <script>
                                 $(document).ready(function(){

var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
removeItemButton: true,
maxItemCount:5,
searchResultLimit:5,
renderChoiceLimit:5
});


});
                            </script>
                        </div>
                        <div class="form-group">
                            <input id="saveBtn" class="btn btn-block btn-info" type="submit" value="create">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <div id="edit_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Project</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="projectform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Project Name</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Project Name" required>
                            <input name="id" id="name" class="form-control" type="hidden" value="{{ $workspace[0]->id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input name="description" id="description" class="form-control" type="text" placeholder="Project Description" required>
                        </div>

                        <div class="form-group">
                            <label for="">Select Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="ongoing">Ongoing</option>
                                <option value="onhold">On Hold</option>
                                <option value="finished">Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Start Date</label>
                                                <input id="datepicker" name="startdate" width="270" required/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap'
                            });
                        </script>
                        </div>
                        <div class="form-group">
                            <label for="">End Date</label>

                            <input id="datepickerl"  name="enddate" width="270" />
                            <script>
                                $('#datepickerl').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="">Project Budget</label>
                            <input name="budget" id="budget" class="form-control" type="number" required>
                        </div>

                        <div class="form-group">
                            <input id="editpro" class="btn btn-block btn-info" type="submit" value="create">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="delete_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Workspace</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>

                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="" name="workspaceID">
                            <h4>Are You Sure? </h4>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                            <input id="deleteworkspace" class="btn btn-block btn-info" type="submit" value="Delete">
                        </div>

                </div>
            </div>
        </div>
    </div>









    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>


$(document).ready(function(){

    var a = $('#workid').val();



var tableLoad = $('#workspaceDT').DataTable({
        ajax: '/admin/projecttable/'+a,
        columns: [
            { "data": "name" },
            { "data": "created_at" },
            { "data": "status" },
            { "data": "startdate" },
            { "data": "enddate" },

            {
                "data": null,
                render: function(data, type, row) {
                return [`<a class="btn btn-sm btn-warning" href="/admin/workspace/{{$workspace[0]->id}}/project/view/${row.id}" data-id="${row.id}"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`,
                `<a class="btn btn-sm btn-success" data-id="${row.id}" id="edit"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#edit_asset_modal" ></i></a>`,
                `<a class="btn btn-sm btn-danger"  data-id="${row.id}" id="deleteWorkspaceModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>`];
                }
            }

        ]
    });




    $("#projectform").on('submit',function(e){
        e.preventDefault();

        $.ajax({
            type:"post",
            url:"/admin/addproject",
            data:$("#projectform").serialize(),
            success: function(response){
                $("#add_workspace_modal").modal('hide')
                tableLoad.ajax.reload();
                swal("Good job!", "Project Created", "success");
            },
            error: function(error){
                console.log(error)
                alert('not saved');
            }
        })


    })


    $(document).on('click','#deleteWorkspaceModal',function(){
        //id = $(this).attr('data-id');

        let workspaceid = $(this).attr('data-id');
            $('#delete_workspace_modal input[name="workspaceID"]').val(workspaceid);

     console.log(workspaceid);
       $('#delete_workspace_modal').modal('show');
   })


    $(document).on('click', '#deleteworkspace', function(e) {
            e.preventDefault();
            let workspaceid = $('#delete_workspace_modal input[name="workspaceID"]').val();
            //alert(leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/deleteproject/' + workspaceid,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_workspace_modal').modal('hide');
                    tableLoad.ajax.reload();
                    swal("Good job!", "Workspace Deleted", "success");
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });




})




//edit

$(document).on('click', '#edit', function(e) {
            e.preventDefault();
            $('#edit_workspace_modal').modal('show');
            let id = $(this).attr('data-id');
            $('#edit_workspace_modal input[name="id"]').val(id);
            $('#checkbox').empty();
           // alert(id);
            $.ajax({
                url: '/admin/editproject/' + id,
                method: 'get',
                dataType: "json",
                success: function(data) {

                     console.log('aaa',data);

                   // $("#percalenderEdit").val(data.percalendar).change();;
                   $('#edit_workspace_modal input[name="id"]').val(data[0].id);
                    $('#edit_workspace_modal input[name="name"]').val(data[0].name);
                    $('#edit_workspace_modal input[name="description"]').val(data[0].description);
                    $('#edit_workspace_modal input[name="startdate"]').val(data[0].startdate);
                    $('#edit_workspace_modal input[name="enddate"]').val(data[0].enddate);
                    $('#edit_workspace_modal input[name="status"]').val(data[0].status);
                    $('#edit_workspace_modal input[name="budget"]').val(data[0].budget);

                   // $('#edit_leaveRequest_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editpro', function(e) {
            e.preventDefault();


let id = $('#edit_workspace_modal input[name="id"]').val();


let name = $("#edit_workspace_modal input[name=name]").val();
let description = $("#edit_workspace_modal input[name=description]").val();

let status = $("#status").val();

let startdate = $("#edit_workspace_modal input[name=startdate]").val();
let enddate = $("#edit_workspace_modal input[name=enddate]").val();
let budget = $("#edit_workspace_modal input[name=budget").val();

            //alert(percalender);

            //alert('/employee/edit-LeaveRequest/' + leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log(id);
            $.ajax({
                url: '/admin/updateproject/ '+id,
                method: 'POST',
                data: {
                    'id': id,
                    'name': name,
                    'description':description,


                    'status': status,
                    'startdate': startdate,
                    'enddate': enddate,
                    'budget': budget
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_LeaveType_modal').modal('hide');
                    swal("Good job!", "Task Edited", "success");
                    location.reload();


                   // alert("sssssss");
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


})


    </script>




@endsection

