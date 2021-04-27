@extends('admin.admin-layouts.master')

 @section('content')
<div class="container">


    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Student</h5>
        </div>
        <div class="card-body">


          <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          @include('partials.message')
          <div class="panel-body table-responsive">

            <div class="form-group">
              <label class="col-md-12" for="example-text">Name</label>
              <div class="col-sm-12">
              <input name="name" type="text" class="form-control"/ required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Email</label>
              <div class="col-sm-12">
              <input name="email" type="email" class="form-control"/ required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Password</label>
              <div class="col-sm-12">
              <input name="password" type="password" class="form-control"/ required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Sex</label>
              <div class="col-sm-12">
                  <select class="form-control select2" name="sex" id="selectsearch">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">DOB</label>
              <div class="col-sm-12">
                  <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Phone</label>
              <div class="col-sm-12">
              <input name="phone" type="text" class="form-control"/ required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Address</label>
              <div class="col-sm-12">

                  <textarea class="form-control" name="address"></textarea>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12" for="example-text">Image</label>
              <div class="col-sm-12">
              <input name="image" type="file" class="form-control"/ >
              </div>
            </div>


            <div class="form-group">
              <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo ('Add Student'); ?></button>
            </div>
          </form>


  </div>
</div>

</div>
@endsection
