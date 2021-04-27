@extends('admin.admin-layouts.master')

@section('content')

<div class="row">
    <div class="card col-md-12 pt-2" >
        <div class="container">
            <h4><b>Workspace : {{ $workspace[0]->name }}</b></h4>
            <h5>Project : {{ $pro[0]->name }}</h5>
            <h6>Assign To : </h6>



            <ul>
                @foreach ($projects as $project)
                @foreach ($project->users as $user)
                <li>{{ $user->name }} </li>
                @endforeach
                @endforeach

            </ul>

        </div>

    </div>
</div>
<br>
<div class="row">
    <div class="container">
        <a href="#add_workspace_modal" data-toggle="modal" class="btn btn-md btn-primary"> + Add Task</a>
    </div>
</div>
<br>

<div id="add_workspace_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="taskform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input name="name" id="name" class="form-control" type="text" placeholder="Task Name">
                        <input name="workspace_id" id="name" class="form-control" type="hidden" value="{{ $workspace[0]->id }}">
                        <input name="project_name" id="name" class="form-control" type="hidden" value="{{ $pro[0]->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input name="description" id="description" class="form-control" type="text" placeholder="Task Description">
                    </div>
                    <div class="form-group">
                        <label>Start Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input class="form-control" type="date" name="startdate" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input class="form-control" type="date" name="enddate" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Select Priority</label>
                        <select class="form-control" name="priority" id="role">

                            <option  value="Low">Low</option>
                            <option  value="Middle">Middle</option>
                            <option  value="High">High</option>

                        </select>


                </div>



                <div class="form-group">
                    <label for="role">Status</label>
                    <select class="form-control" name="status" id="role">

                        <option  value="inprogress">In Progress</option>
                        <option  value="todo">To Do</option>
                        <option  value="finished">Finished</option>

                    </select>


            </div>

            <div class="form-group">
                <label for="">Assign To</label>
                <div class="checkbox">
                    @foreach ($projects as $project)
                    @foreach ($project->users as $user)
                    <label><input type="checkbox" name="user_id[]" value="{{ $user->id }}"> {{ $user->name }}</label>

                    @endforeach
                    @endforeach

                  </div>
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
                <h4 class="modal-title">Edit Task</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="taskform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input name="id" id="namey" class="form-control" type="hidden" placeholder="Task Name">
                        <input name="name" id="namey" class="form-control" type="text" placeholder="Task Name">
                        <input name="workspace_id" id="name" class="form-control" type="hidden" value="{{ $workspace[0]->id }}">
                        <input name="project_name" id="name" class="form-control" type="hidden" value="{{ $pro[0]->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input name="description" id="description" class="form-control" type="text" placeholder="Task Description">
                    </div>
                    <div class="form-group">
                        <label>Start Date:</label>
                        <div class="input-group date " id="startdate" data-target-input="nearest">
                            <input class="form-control" type="date" name="startdate" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input class="form-control" type="date" name="enddate" id="enddate"/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Select Priority</label>
                        <select class="form-control" name="priority" id="priority">

                            <option  value="Low">Low</option>
                            <option  value="Middle">Middle</option>
                            <option  value="High">High</option>

                        </select>


                </div>



                <div class="form-group">
                    <label for="role">Status</label>
                    <select class="form-control" name="status" id="status">

                        <option  value="inprogress">In Progress</option>
                        <option  value="todo">To Do</option>
                        <option  value="finished">Finished</option>

                    </select>


            </div>

            <div class="form-group">
                <label for="">Assign To</label>
                <div class="checkbox" id="checkbox">


                  </div>


            </div>


                    <div class="form-group">
                        <input id="edittask" class="btn btn-block btn-info" type="submit" value="update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row">
           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               In Progress</div>

                               <div class="row" id="inprog">

                               </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                To Do</div>
                                <div class="row" id="todo">

                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Complete</div>
                               <div class="row" id="finished">



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<div id="delete_task_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Task</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>

                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="" name="taskID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deletetask" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>

            </div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>


    $(document).ready(function(){


        $('#inprog').ready(function(){


            $.ajax({
                type:"get",
                url:"/admin/inprogtask",
                dataType: "json",

                success: function(response){
                    var appendString="";
                    for(var i = 0; i < response.length; i++){

                        appendString += `<br><div class="card pt-2 col-md-12">
                                 <b>${response[i].name}</b>
                                   <p>${response[i].description}</p>

                                   <span class="badge badge-primary">${response[i].startdate}</span>
                                   <span class="badge badge-danger">${response[i].enddate}</span>
                                   <p> assign to : ${response[i].assign_to}</p>
                                   <br>
                                    <p>Priority:  <span class="badge badge-primary">${response[i].priority}</span></p>
                                    <a data-id="${response[i].id}" data-toggle="modal" id="edit" class="btn btn-sm btn-warning">edit</a>
                                        <a  data-id="${response[i].id}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>
                           <br></div>`

                    }

                    $('#inprog').empty().append(appendString);

                    //swal("Good job!", "Project Created", "success");
                },
                error: function(error){
                    console.log(error)
                    alert('not saved');
                }
            })



        })




        $('#todo').ready(function(){


$.ajax({
    type:"get",
    url:"/admin/todo",
    dataType: "json",

    success: function(response){
        var appendString="";
        for(var i = 0; i < response.length; i++){

            appendString += `<br><div class="card pt-2 col-md-12">
                     <b>${response[i].name}</b>
                       <p>${response[i].description}</p>

                       <span class="badge badge-primary">${response[i].startdate}</span>
                       <span class="badge badge-danger">${response[i].enddate}</span>
                       <p> assign to: ${response[i].assign_to}</p>
                       <br>
                        <p>Priority:  <span class="badge badge-primary">${response[i].priority}</span></p>
                        <a data-id="${response[i].id}" data-toggle="modal" id="edit" class="btn btn-sm btn-warning">edit</a>
                            <a  data-id="${response[i].id}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>
               <br></div>`

        }

        $('#todo').empty().append(appendString);


        //swal("Good job!", "Project Created", "success");
    },
    error: function(error){
        console.log(error)
        alert('not saved');
    }
})



})



$('#finished').ready(function(){


$.ajax({
    type:"get",
    url:"/admin/finished",
    dataType: "json",

    success: function(response){
        var appendString="";
        for(var i = 0; i < response.length; i++){

            appendString += `<br><div class="card pt-2 col-md-12">
                     <b>${response[i].name}</b>
                       <p>${response[i].description}</p>


                       <span class="badge badge-primary">${response[i].startdate}</span>
                       <span class="badge badge-danger">${response[i].enddate}</span>
                       <p> assign to : ${response[i].assign_to}</p>
                       <br>
                        <p>Priority:  <span class="badge badge-primary">${response[i].priority}</span></p>
                        <a href="" class="btn btn-sm btn-warning">edit</a>
                            <a  data-id="${response[i].id}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>
               <br></div>`

        }

        $('#finished').empty().append(appendString);


        //swal("Good job!", "Project Created", "success");
    },
    error: function(error){
        console.log(error)
        alert('not saved');
    }
})



})










        $("#taskform").on('submit',function(e){
            e.preventDefault();

            $.ajax({
                type:"post",
                url:"/admin/addtask",
                data:$("#taskform").serialize(),
                success: function(response){
                    $("#add_workspace_modal").modal('hide')
                   location.reload();
                    swal("Good job!", "Project Created", "success");

                },
                error: function(error){
                    console.log(error)
                    alert('not saved');
                }
            })


        })



    $(document).on('click','#delete',function(){
        //id = $(this).attr('data-id');

        let id = $(this).attr('data-id');
            $('#delete_task_modal input[name="taskID"]').val(id);

    // console.log(workspaceid);
       $('#delete_task_modal').modal('show');
   })



   $(document).on('click', '#deletetask', function(e) {
            e.preventDefault();
            let id = $('#delete_task_modal input[name="taskID"]').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/deletetask/' + id,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_task_modal').modal('hide');
                   location.reload();
                    swal("Good job!", "Task Deleted", "success");
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
            //alert(leaveRequestID);
            $.ajax({
                url: '/admin/edittask/' + id,
                method: 'get',
                dataType: "json",
                success: function(data) {


                   // $("#percalenderEdit").val(data.percalendar).change();;
                    $('#edit_workspace_modal input[name="name"]').val(data[0].name);
                    $('#edit_workspace_modal input[name="description"]').val(data[0].description);
                    $('#edit_workspace_modal input[name="startdate"]').val(data[0].startdate);
                    $('#edit_workspace_modal input[name="enddate"]').val(data[0].enddate);
                    $('#edit_workspace_modal input[name="status"]').val(data[0].status);
                    for(var i = 0; i < data.length; i++){
                    $('#checkbox').append(`<input type="checkbox" name="user_id[]"  value="${data[i].user_id}" checked>${data[i].user_id}
                    <br>`);
                }

                   // $('#edit_leaveRequest_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#edittask', function(e) {
            e.preventDefault();


            let id = $('#edit_workspace_modal input[name="id"]').val();


let name = $("#edit_workspace_modal input[name=name]").val();
let description = $("#edit_workspace_modal input[name=description]").val();

let status = $("#status").val();

let priority = $("#priority").val();
let startdate = $("#edit_workspace_modal input[name=startdate]").val();
let enddate = $("#edit_workspace_modal input[name=enddate]").val();
let userid = $("#edit_workspace_modal input[name=user_id").val();

            //alert(percalender);

            //alert('/employee/edit-LeaveRequest/' + leaveRequestID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log(startdate);
            $.ajax({
                url: '/admin/updatetask/ '+id,
                method: 'POST',
                data: {
                    'id': id,
                    'name': name,
                    'description':description,
                    'status': status,
                    'priority': priority,
                    'status': status,
                    'startdate': startdate,
                    'enddate': enddate,
                    'user_id': userid
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
