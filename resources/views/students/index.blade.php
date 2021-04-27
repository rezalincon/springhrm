@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Student Management</h5>
            <div class="row">
                <div class="col-md-10">

                </div>
                <div class="col-md-2">
                    <a href="{{ route('student.create') }}" class="mr-auto btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo ('Add Student'); ?></a>
                </div>
            </div>


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
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                       @foreach ( $students as $student )
                         <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <img src="{{ asset('files/uploads/students/'.$student->image) }}" alt="" width="50px;" height="50px;" class="rounded-circle">
                            </td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->sex }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ date("jS F, Y", strtotime($student->birthday)) }}</td>
                            <td>{{ $student->address }}</td>
                            <td>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                <a href="#deleteModal{{ $student->id }}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('student.delete', $student->id) }}" method="post">
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
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Address</th>
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
