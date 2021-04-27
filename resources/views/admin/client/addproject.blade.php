@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">


    <div class="card col-md-8" >
        <div class="card-header py-3" >
            <h5 class="card-title"> Add Project Status</h5>
        </div>
        <div class="card-body">


            <form action="{{ route('admin.storeclientproject') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="name">Select Client</label>
               <select name="status" id="" class="form-control">
                   <option value="onhold">On Hold</option>
                   <option value="ongoing">On Going</option>
                   <option value="finished">Finished</option>
               </select>
            </div>

            <div class="form-group">
                <label for="name">Select Client</label>
               <select name="client" id="" class="form-control">
                   @foreach ($user as $u)
                   <option value="{{$u->id}}">{{$u->name}}</option>
                   @endforeach

               </select>
            </div>



            <button type="submit" class="btn btn-outline-primary">Add</button>
            </form>


  </div>
</div>

</div>
@endsection
