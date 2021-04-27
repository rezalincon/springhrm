@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">
   

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Update Trainer</h5>
        </div>
        <div class="card-body">
            
           
            <form action="{{ route('trainer.update', $trainer->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')
                
            <div class="form-group">
                <label for="name">Enter trainer name</label>
                <input type="text" name="name" class="form-control" value="{{ $trainer->name }}">
            </div>

            

            <div class="form-group">
                <label for="course_id" class="">Course Name</label>

                <div class="">
                  <select class="form-control" name="course_id" id="course_id">
                    <option value="">Select course name</option>
                    @foreach ($courses as $course)
                      <option value="{{ $course->id }}"{{ $course->id == $trainer->course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Email</label>
                <div class="col-sm-12">            
                <input name="email" type="email" class="form-control" value="{{ $trainer->email }}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Password</label>
                <div class="col-sm-12">            
                <input name="password" type="password" class="form-control" value="{{ $trainer->password }}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Sex</label>
                <div class="col-sm-12">
                    <select class="form-control select2" name="sex" id="sexid">
                      <option value="Male"{{ $trainer->sex == "Male" ? 'selected' : '' }}>Male</option>
                      <option value="Female"{{ $trainer->sex == "Female" ? 'selected' : '' }}>Female</option>
                    </select>
  
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">DOB</label>
                <div class="col-sm-12">
                    <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input">
                </div>
              </div>
  
              <div class="form-group">
                <label class="col-md-12" for="example-text">Phone</label>
                <div class="col-sm-12">            
                <input name="phone" type="text" class="form-control" value="{{ $trainer->phone }}">
                </div>
              </div>

              <div class="form-group">
                <label for="description">Enter trainer description</label>
                <textarea name="description" rows="8" cols="80" class="form-control">{{ $trainer->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Trainer Image</label>
                <img src="{{ asset('files/uploads/trainers/'.$trainer->image) }}" alt="" width="50px;" height="50px;" class="rounded-circle"> 
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-save"></i>&nbsp;<?php echo ('Update Trainer'); ?></button>
              </div>
            </form>
    
    
  </div>
</div>

</div>
@endsection