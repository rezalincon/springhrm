@extends('client.client-layouts.master')

 @section('content')
<div class="container">


    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Send Messages</h5>
        </div>
        <div class="card-body">


            <form action="{{ route('client.storemessage') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')
            <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" name="client_sub" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Message</label>
                <textarea name="client_message" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
            </form>


  </div>
</div>

</div>
@endsection
