@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Workspace</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%; margin-bottom:20px;">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_workspace_modal" style="float: right;">Add new Workspace</a>
                    </div>
                    <div style="width: 100%">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="workspaceDT" width="100%" cellspacing="0">
                                <thead>
                                <tr>

                                    <th>Name</th>
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
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Workspace</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="workspaceform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="name" id="name" class="form-control" type="text" placeholder="Workspace Name">
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
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Workspace</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="workspaceform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="id" id="name" class="form-control" type="hidden" placeholder="Workspace Name">
                            <input name="name" id="name" class="form-control" type="text" placeholder="Workspace Name">
                        </div>
                        <div class="form-group">
                            <input id="edit" class="btn btn-block btn-info" type="submit" value="create">
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

<script type="text/javascript">

   $(document).ready(function(){

    var tableLoad = $('#workspaceDT').DataTable({
            ajax: '/admin/workspacetable',
            columns: [
                { "data": "name" },

                {
                    "data": null,
                    render: function(data, type, row) {
                    return [`<a class="btn btn-sm btn-warning" href="workspace/view/${row.id}" data-id="${row.id}"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" href="#" id="editAssetTypeModal"></i></a>`,
                    `<a class="btn btn-sm btn-success" data-id="${row.id}"  id="editWorkspaceModal"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" ></i></a>`,
                    `<a class="btn btn-sm btn-danger"  data-id="${row.id}" id="deleteWorkspaceModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>`];
                    }
                }

            ]
        });





    $("#workspaceform").on('submit',function(e){
        e.preventDefault();

        $.ajax({
            type:"post",
            url:"/admin/addworkspace",
            data:$("#workspaceform").serialize(),
            success: function(response){
                $("#add_workspace_modal").modal('hide')
                tableLoad.ajax.reload();
                swal("Good job!", "Workspace Created", "success");
            },
            error: function(error){
                console.log(error)
                alert('not saved');
            }
        })


    })

  //  var id;

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
                url: '/admin/deleteworkspace/' + workspaceid,
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


        });




         // Edit
         $(document).on('click', '#editWorkspaceModal', function(e) {
            e.preventDefault();
            $('#edit_workspace_modal').modal('show');
            let id = $(this).attr('data-id');
            $('#edit_workspace_modal input[name="id"]').val(id);

            //alert(id);
            $.ajax({
                url: '/admin/editworkspace/' + id,
                method: 'get',
                dataType: "json",
                success: function(data) {
                  console.log(data.name);


                    $('#edit_workspace_modal input[name="name"]').val(data.name);


                    //$('#edit_leaveRequest_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#edit', function(e) {
            e.preventDefault();

            let id = $('#edit_workspace_modal input[name="id"]').val();
            let name = $('#edit_workspace_modal input[name="name"]').val();


            console.log(name);
            //alert('/employee/edit-LeaveRequest/' + leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/editworkspace/' + id,
                method: 'POST',
                data: {
                    'id': id,
                    'name': name

                },
                success: function(response) {
                    console.log(response);
                    $('#edit_workspace_modal').modal('hide');
                    tableLoad.ajax.reload();
                    swal("Good job!", "Workspace Edited", "success");

                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });






});




  </script>



@endsection

