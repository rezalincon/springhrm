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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Priority</th>
                            <th>Meeting Date</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientInfo as $key=>$client)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->client_priority}}</td>
                                <td>{{$client->client_meeting_date}}</td>
                                <td>{{$client->client_email}}</td>
                                <td>{{$client->client_mobile}}</td>
                                <td>{{$client->client_company}}</td>
                                <td>{{$client->client_address}}</td>
                                <td>{{$client->client_website}}</td>
                                <td> <a class="btn btn-outline-info btn-xs" href="{{route('client.edit',$client->id)}}">Edit</a> </td>
                                <td>
                                    <form action="{{route('client.destroy', $client->id)}}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-xs" onclick="return confirm('Are You Confirm To Delete')" >Delete</button>
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
