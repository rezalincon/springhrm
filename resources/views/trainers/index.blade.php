@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Trainer Management</h5>
            <a href="{{ route('trainer.create') }}" class="mr-auto btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo ('Add Trainer'); ?></a>
        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sex</th>
                            <th>DOB</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                       @foreach ( $trainers as $trainer )
                         <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $trainer->name }}</td>
                            <td>
                              <img src="{{ asset('files/uploads/trainers/'.$trainer->image) }}" alt="" width="50px;" height="50px;" class="rounded-circle">
                            </td>
                            <td>{{ $trainer->course->name }}</td>
                            <td>{{ $trainer->email }}</td>
                            <td>{{ $trainer->phone }}</td>
                            <td>{{ $trainer->sex }}</td>
                            <td>{{ date("jS F, Y", strtotime($trainer->birthday)) }}</td>
                            <td>{{ $trainer->description }}</td>
                            <td>
                                <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                <a href="#deleteModal{{ $trainer->id }}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{ $trainer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('trainer.delete', $trainer->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                              </div>
                              <div class="modal-footer">

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                              </div>
                            </div>
                          </div>
                            </td>
                        </tr>
                       @endforeach

                       <tfoot>
                        <tr>
                          <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sex</th>
                            <th>DOB</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                       </tfoot>
                    </tbody>

                </table>
            </div>


  </div>
</div>

</div>
@endsection

{{--
@extends('admin.admin-layouts.master')

@section('content')

<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
      <body>
         <div class="container">
               <h2>Laravel DataTables Tutorial Example</h2>
            <div class="table-responsive">
              <table class="table table-bordered" id="table" width="100%">
                <thead>
                   <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Course Name</th>
                      <th>Phone</th>
                      <th>Sex</th>
                      <th>DOB</th>
                   </tr>
                </thead>
             </table>
            </div>
         </div>
       <script>
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('trainer.index') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'course_id', name: 'course' },
                        { data: 'phone', name: 'phone' },
                        { data: 'sex', name: 'sex' },
                        { data: 'birthday', name: 'birthday' },
                     ]
            });
         });
         </script>
   </body>
</html>

@endsection --}}
