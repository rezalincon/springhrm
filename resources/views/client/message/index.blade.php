@extends('client.client-layouts.master')

 @section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">My Messages</h5>
            <a href="{{ route('client.addmessage') }}" class="mr-auto btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo ('Send Message'); ?></a>
        </div>
        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-dark">
                        <tr>

                            <th>Title</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($msg as $m)
                        <tr>
                            <td>{{$m->subject}}</td>
                            <td>{{$m->message}}</td>
                            <td>
                                <a href="{{route('client.deletemessage',$m->id)}}" class="btn btn-sm btn-danger">delete</a>
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
