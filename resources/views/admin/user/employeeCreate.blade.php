@extends('admin.admin-layouts.master') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Employee</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add New Employee</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Fill the form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.store')}}" method="post">
            @csrf @include('admin.user._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card -->

<form method="POST" action="{{route('admin.EmployeeCreate')}}" enctype="multipart/form-data">
    @csrf
  
<div class="row gutters-sm" style="width: 100%;margin-left: 10px;">
    <div class="row-md-4 mb-3 mt-3" style="width: 100%;margin-right: 24px;">
      <div class="card">
        <div class="card-body d-flex">
          <div class="d-flex align-items-center" style="width:70%">
            <div>
                <img src="" alt="employee" class="rounded-circle" width="65px" height="65px"> 
            </div>
            
            <div class="mt-3" style="margin-left: 15px">
                <input name="photo" class="form-control" type="file">                
            </div>
          </div>
          
        </div>
      </div>
    </div>
<div class="row-md-8" style="display: flex; width: 100%; margin-left: -11px;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 1.5rem; margin-bottom: 14px;">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="name" class="form-control" type="text" placeholder="Full Name" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="email" class="form-control" type="number" placeholder="Email" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="contact" class="form-control" type="number" placeholder="contact" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="age" class="form-control" type="number" placeholder="age" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Emergency Contact</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="emergency_contact" class="form-control" type="number" placeholder="emergency_contact" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <select name="gender" class="form-control">
                            <option>-select-</option>

                            <option value="male" >Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Marital Status</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <select name="gender" class="form-control">
                            <option>-select-</option>

                            <option value="married" >Married</option>
                            <option value="single">Single</option>
                            <option value="separeted">Separeted</option>

                        </select>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="padding: 1.5rem; margin-bottom: 14px;">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Joining Date</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="joining_date" class="form-control" type="date" placeholder="joining_date" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Present Address</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="present_address" class="form-control" type="text" placeholder="present_address" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Permanent Address</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="permanent_address" class="form-control" type="text" placeholder="permanent_address" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">NID Number</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="nid" class="form-control" type="number" placeholder="nid" value="" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Department</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <select name="department" class="form-control">
                            <option>-select-</option>
                            @foreach ( $all_department as $department )
                                <option value="{{$department->dept_name}}" >{{$department->dept_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Designation</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <select name="designation" class="form-control">
                            <option>-select-</option>
                            @foreach ( $all_designation as $designation )
                                <option value="{{$designation->designation_name}}" >{{$designation->designation_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <input name="dob" class="form-control" type="date" placeholder="date of birth" value="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row gutters-sm mt-3 mb-2" style="width: 100%; margin-left: 10px;">
    <div class="row-md-12" style="display: flex; width: 100%; margin-left: -11px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Academic Qualification</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea id="academic_qualification" name="academic_qualification" class="form-control"> </textarea>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Professional Qualification</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea id="professional_qualification" name="professional_qualification" class="form-control"> </textarea>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea id="experience" name="experience" class="form-control"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-md-12 mb-3" style="justify-content: center;display: flex;">
    <input value="Add Employee" type="submit" class="btn btn-md btn-info"  >
</div>

</form>
@endsection
