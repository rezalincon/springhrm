@extends('admin.admin-layouts.master')

@section('content')


<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Logo</h6>
        </div>
        <div class="card-body">

            <br>

            @if (session()->has('success'))
            <div class="alert alert-success">
              Logo Updated
            </div>

            @endif

            <form action="{{route('logo.store')}}" method="post" enctype="multipart/form-data">
                @csrf


            <div class="form-group col-md-5">
                <label for="image">Add Logo</label>
                <input type="file" name="image" class="form-control" required><p>Only .png Files</p>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="add">
              </div>
            </form>

        </div>
    </div>

</div>







@endsection
