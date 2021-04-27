@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">
   

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Update Student</h5>
        </div>
        <div class="card-body">
            
           
          <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @include('partials.message')
          <div class="panel-body table-responsive">
                      
            <div class="form-group">
              <label class="col-md-12" for="example-text">Name</label>
              <div class="col-sm-12">            
              <input name="name" type="text" class="form-control" value="{{$student->name}}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Email</label>
              <div class="col-sm-12">            
              <input name="email" type="email" class="form-control" value="{{ $student->email }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Password</label>
              <div class="col-sm-12">            
              <input name="password" type="password" class="form-control" value="{{ $student->password }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Sex</label>
              <div class="col-sm-12">
                  <select class="form-control select2" name="sex" id="sexid">
                    <option value="Male"{{ $student->sex == "Male" ? 'selected' : '' }}>Male</option>
                    <option value="Female"{{ $student->sex == "Female" ? 'selected' : '' }}>Female</option>
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
              <input name="phone" type="text" class="form-control" value="{{ $student->phone }}">
              </div>
            </div>
                      
            <div class="form-group">
              <label class="col-md-12" for="example-text">Address</label>
              <div class="col-sm-12">

                  <textarea class="form-control" name="address">{{ $student->address }}</textarea>

              </div>
            </div>

            <div class="form-group">
              <label for="image">Student Image</label>
              <img src="{{ asset('files/uploads/students/'.$student->image) }}" alt="" width="50px;" height="50px;" class="rounded-circle"> 
              <input type="file" name="image" class="form-control">
          </div>
                      
                      
            <div class="form-group">
              <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-save"></i>&nbsp;<?php echo ('Update Student'); ?></button>
            </div>
          </form>
    
    
  </div>
</div>

</div>



@endsection


