@extends('admin.admin-layouts.master')
@section('content')
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

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">List of files</h6>
            </div>
            <div class="card-header py-3">
                <form action="{{route('delete.all')}}" method="post" >
                    @csrf
                    <button class="btn btn-outline-danger btn-xs" onclick="return confirm('Are You Confirm To Delete')" >Delete all files</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Employee Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Files</th>
                            <th>Download</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $key=>$file )
                            <tr>
                                <td>{{$files->firstItem() + $key}}</td>
                                <td>{{$file->title}}</td>
                                <td>{{$file->user->name}}</td>
                                <td>{{$file->description}}</td>
                                <td>{{$file->created_at->format('d-m-Y')}}</td>
                                <td>
                                    {{$file->files}}
                                </td>
                                <td> <a class="btn btn-primary btn-xs" href="{{route('file.download',$file->files)}}" ><i class="fa fa-download"></i></a> </td>
                                <td>
                                    <form action="{{route('file-management.destroy', $file->id)}}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Confirm To Delete')" >Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
