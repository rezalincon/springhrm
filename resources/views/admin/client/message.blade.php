@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Messages</h5>

        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>

                            <th>Title</th>
                            <th>Message</th>
                            <th>client name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($msg as $m)
                        <tr>
                            <td>{{$m->subject}}</td>
                            <td>{{$m->message}}</td>
                            <td>{{$m->name}}</td>
                            <td>
                                <a href="{{route('admin.deletemessage',$m->cid)}}" class="btn btn-sm btn-danger">delete</a>
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
