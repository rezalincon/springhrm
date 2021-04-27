@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">


    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Add Trainer</h5>
        </div>
        <div class="card-body">


            <form action="{{ route('trainer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('partials.message')

            <div class="form-group">
                <label for="name">Enter trainer name</label>
                <input type="text" name="name" class="form-control" required>
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
                <label class="col-md-12" for="example-text">Email</label>

                <input name="email" type="email" class="form-control"/ required>

              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Password</label>

                <input name="password" type="password" class="form-control"/ required>

              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Sex</label>

                    <select class="form-control select2" name="sex" id="selectsearch">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">DOB</label>

                    <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input" required>

              </div>

              <div class="form-group">
                <label class="col-md-12" for="example-text">Phone</label>

                <input name="phone" type="text" class="form-control"/ required>

              </div>

              <div class="form-group">
                <label for="description">Enter trainer description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Trainer Image</label>
                <input type="file" name="image" class="form-control" >
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo ('Add Trainer'); ?></button>
              </div>
            </form>


  </div>
</div>

</div>
@endsection
