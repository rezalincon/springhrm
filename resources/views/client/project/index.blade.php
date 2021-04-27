@extends('client.client-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Projects</h5>


        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>

                            <th>Project Name</th>
                            <th>Status</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($p as $p)
                            <tr>
                                <td>{{$p->project_name}}</td>
                                <td> <span class="badge badge-success">{{$p->project_status}}</span> </td>

                            </tr>
                        @endforeach




                    </tbody>

                </table>
            </div>


  </div>
</div>

</div>
@endsection
