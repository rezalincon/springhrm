@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">


    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Add Department</h5>
        </div>
        <div class="card-body">


            <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')
            <div class="form-group">
                <label for="name">Enter department name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Enter department description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Department</button>
            </form>


  </div>
</div>

</div>
@endsection
