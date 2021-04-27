@extends('admin.admin-layouts.master')

@section('content')

    <!-- /.content-header -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Add File</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('file-management.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                @include('employee.file-management._form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->


@endsection
