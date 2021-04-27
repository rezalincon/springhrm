@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Projects</h5>

            <a href="{{route('admin.addclientproject')}}" class="btn  btn-outline-primary">Add Project</a>
            <br>

        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>

                            <th>Project Name</th>
                            <th>Status</th>
                            <th>client name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($p as $p)
                            <tr>
                                <td>{{$p->project_name}}</td>
                                <td>{{$p->project_status}}</td>
                                <td>{{$p->name}}</td>
                                <td>
                                    <a href="{{route('admin.deleteclientproject',$p->cid)}}" class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach




                    </tbody>

                </table>
            </div>


  </div>
</div>

</div>
@endsection
