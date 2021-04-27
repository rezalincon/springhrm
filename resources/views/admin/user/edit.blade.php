@extends('admin.admin-layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Fill the form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.updateuser') }}"  method="post" enctype="multipart/form-data">
                @csrf


                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user[0]->name }}">
                        <input type="hidden" name="id" class="form-control"  value="{{ $user[0]->id }}">
                        @error('name')<i class="text-danger">{{$message}}</i>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user[0]->email }}" placeholder="Enter User Email">
                        @error('email')<i class="text-danger">{{$message}}</i>@enderror
                    </div>

                    

                    <div class="form-group">
                        <label for="role">Select Role</label>
                        <select class="form-control" name="role" id="role">
                            <option  value="{{ $user[0]->role }}"> {{ $user[0]->role }}</option>
                            <option disabled>--Change Status--</option>

                            <option  value="admin">admin</option>
                            <option  value="employee">employee</option>
                            <option  value="client">client</option>

                        </select>


                    </div>
                    

                <div class="form-group">
                    <label for="status">Select Status</label>
                    <select class="form-control" name="status" required>
                        <option  value="{{ $user[0]->status }}">@if ($user[0]->status==1)
                            <p>Enabled</p>
                        @else
                        <p>Disabled</p>
                        @endif</option>
                        <option disabled>--Change Status--</option>

                        <option  value="1">Enabled</option>
                        <option  value="0">Disabled</option>

                    </select>

                @error('status')<i class="text-danger">{{$message}}</i>@enderror
                </div>

                <!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- /.card -->
@endsection
