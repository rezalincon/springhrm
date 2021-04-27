@extends('admin.admin-layouts.master')

@section('content')
<div class="container">
    

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Update Course</h5>
        </div>
        <div class="card-body">
            
           
            <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')
            <div class="form-group">
                <label for="name">Enter course name</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}">
            </div>

               <div class="form-group">
                <label for="department_id" class="">Department Name</label>

                <div class="">
                  <select class="form-control" name="department_id" id="department_id">
                    <option value="">Select department name</option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}"{{ $department->id == $course->department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            <div class="form-group">
                <label for="description">Enter course description</label>
                <textarea name="description" rows="8" cols="80" class="form-control">{{ $course->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
    
    
  </div>
</div>

</div>
@endsection