@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">
   

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Enroll</h5>
        </div>
        <div class="card-body">
            
           
            <form action="{{ route('enroll.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')


             <div class="form-group">
                <label for="division_id" class="">Student Name</label>

                <div class="">
                  <select class="form-control" name="student_id" id="student_id">
                    <option value="">Select student name</option>
                    @foreach ($students as $student)
                      <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

             <div class="form-group">
                <label for="division_id" class="">Trainer Name</label>

                <div class="">
                  <select class="form-control" name="trainer_id" id="trainer_id">
                    <option value="">Select trainer name</option>
                    @foreach ($trainers as $trainer)
                      <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="department_id" class="">Department Name</label>

                <div class="">
                  <select class="form-control" name="department_id" id="department_id">
                    <option value="">Select department name</option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="course_id" class="">Course Name</label>

                <div class="">
                  <select class="form-control" name="course_id" id="course_id">
                    <option value="">Select course name</option>
                    @foreach ($courses as $course)
                      <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" required>
              </div>

            <div class="form-group">
              <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo ('Add Enroll'); ?></button>
            </div>
            </form>
    
    
  </div>
</div>

</div>


@endsection