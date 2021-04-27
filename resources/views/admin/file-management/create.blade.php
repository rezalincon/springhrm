@extends('admin.admin-layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
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
            <form action="{{route('file-management.store')}}"  method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.file-management._form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success">Send</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection
