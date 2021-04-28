@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Department Management</h5>
            <a href="{{ route('department.create') }}" class="mr-auto btn btn-outline-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo ('Add Department'); ?></a>
        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                       @foreach ( $departments as $department )
                         <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->description }}</td>
                            <td>
                                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-info" ><i class="fas fa-edit" ></i></a>

                                <a href="#deleteModal{{ $department->id }}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('department.delete', $department->id) }}" method="post">
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
