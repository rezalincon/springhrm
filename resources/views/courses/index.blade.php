@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

<div class="row">
  <div class="col-md-4 col-sm-6">
      <div class="card" style="width: 18rem;">

    <div class="card-title text-primary"><h3>Enrolled Student</h3></div>
          <div class="card-body">
            <h3 class="card-title text-success">Laravel</h3>{{ $laravel->count() }}
            <span class="text-muted">Student</span>
          </div>
        </div>
  </div>

  <div class="col-md-4 col-sm-6">
      <div class="card" style="width: 18rem;">
        <div class="card-title text-primary"><h3>Enrolled Student</h3></div>
          <div class="card-body">
            <h3 class="card-title text-success">JavaScript</h3>{{ $javascript->count() }}
            <span class="text-muted">Student</span>
          </div>
        </div>
  </div>


  <div class="col-md-4 col-sm-6">
      <div class="card" style="width: 18rem;">
        <div class="card-title text-primary"><h3>Enrolled Student</h3></div>
          <div class="card-body">
            <h3 class="card-title text-success">Python</h3>{{ $python->count() }}
            <span class="text-muted">Student</span>
          </div>
        </div>
  </div>
</div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Course Management</h5>
            <a href="{{ route('course.create') }}" class="mr-auto btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo ('Add Course'); ?></a>
        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                       @foreach ( $courses as $course )
                         <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->department->name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary btn-xl"><i class="fas fa-edit"></i></a>

                                <a href="#deleteModal{{ $course->id }}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('course.delete', $course->id) }}" method="post">
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
