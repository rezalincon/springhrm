@extends('admin.admin-layouts.master')

@section('content')

<form method="POST" enctype="multipart/form-data">
  @csrf

  <div class="row gutters-sm" style="width: 100%;margin-left: 10px;">
    <div class="row-md-4 mb-3" style="width: 100%;margin-right: 24px;">
      <div class="card">
        <div class="card-body d-flex">
          <div class="d-flex align-items-center" style="width:50%">
            @foreach($all_profile as $profile)
            <img src="/files/uploads/{{ $profile->avatar }}" alt="Admin" class="rounded-circle" width="65px" height="65px">

               @endforeach

            <div class="mt-3" style="margin-left: 15px">
                <input name="photo" class="form-control" type="file">
            </div>
          </div>
          <div class="justify-content-end" style="width: 50%;">
            <input value="Update Profile" type="submit" class="btn btn-sm btn-info" href="" style="float: right;">
          </div>
        </div>
      </div>

    </div>
    <div class="row-md-8" style="display: flex;width: 100%; margin-left: -11px;">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body"  style="padding: 1.5rem;margin-bottom:14px">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-8 text-secondary">


                @foreach($all_profile as $profile)
                <input name="user_id" class="form-control" type="hidden" placeholder="Name" value="{{ $profile->user->id }}">
                <input name="full_name" class="form-control" type="text" placeholder="Name" value="{{ $profile->user->name }}">
                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="email" class="form-control" type="text" placeholder="" value="{{ $profile->user->email }}" >
                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Mobile</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="contact" class="form-control" type="number" placeholder="" value="{{ $profile->contact }}">

               @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                  <h6 class="mb-0">Salary</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @foreach($all_profile as $profile)
                  <input name="salary" class="form-control" type="number" placeholder="" value="{{ $profile->salary }}">

                 @endforeach
                </div>
              </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Age</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="age" class="form-control" type="number" placeholder="" value="{{ $profile->age }}">
               @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Emergency Contact</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="emergency_contact" class="form-control" type="number" placeholder="" value="{{ $profile->emergency_contact }}">
               @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Gender  </h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <select name="gender" class="form-control">
                  <option >-select-</option>
                  @if($profile->gender == 'male')
                  <option value="male" selected>Male</option>
                  <option value="female">Female</option>
                  @else
                  <option value="male" >Male</option>
                  <option value="female" selected>Female</option>
                  @endif
              </select>

               @endforeach
              </div>
            </div>
            <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-0">Marital Status</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <select name="marital_status" class="form-control">
                            <option>-select-</option>
                            @foreach ($all_profile as $profile)
                            <option {{ ($profile->marital_status) == 'married' ? 'selected' : '' }} value="married" >Married</option>
                            <option {{ ($profile->marital_status) == 'single' ? 'selected' : '' }} value="single">Single</option>
                            <option {{ ($profile->marital_status) == 'separeted' ? 'selected' : '' }} value="separeted">Separeted</option>
                            @endforeach

                        </select>
                    </div>
                </div>
          </div>
        </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" style="padding: 1.5rem; margin-bottom:14px">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Joining Date</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="joining_date" class="form-control" type="date" placeholder="" value="{{ $profile->joining_date }}" >

                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                  <h6 class="mb-0">Date of Birth</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                  <input name="dob" class="form-control" type="date" placeholder="" value="{{ $profile->dob }}" />
                @endforeach
              </div>
          </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Present Address</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="present_address" class="form-control" type="text" placeholder="" value="{{ $profile->present_address }}">
                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Permanent Address</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="permanent_address" class="form-control" type="text" placeholder="" value="{{ $profile->permanent_address }}">
                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">NID Number</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="nid" class="form-control" type="number" placeholder="" value="{{ $profile->nid }}">
                 @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                  <h6 class="mb-0">Department</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                  <select name="department" class="form-control">
                    <option>-select-</option>
                        @foreach ($all_department as $department)
                        <option value="{{$department->dept_name}}"
                          @foreach ($all_profile as $profile)
                            @if ($profile->department == $department->dept_name)
                            {{'selected="selected"'}}
                            @endif
                          @endforeach >
                         {{ $department->dept_name }} </option>
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
                      @foreach ($all_designation as $designation)
                        <option value="{{$designation->designation_name}}"
                          @foreach ($all_profile as $profile)
                            @if ($profile->designation == $designation->designation_name)
                            {{'selected="selected"'}}
                            @endif
                          @endforeach >
                         {{ $designation->designation_name }} </option>
                       @endforeach
                  </select>
              </div>
          </div>

          </div>
        </div>

      </div>

    </div>
  </div>

  <div class="row gutters-sm mt-3" style="width: 100%;margin-left: 10px;">

    <div class="row-md-12 " style="display: flex;width: 100%; margin-left: -11px;">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Academic Qualification
                </h6>
              </div>
              <div class="col-sm-9 text-secondary">
                @foreach($all_profile as $profile)
                <textarea id="academic_qualification" name="academic_qualification" class="form-control">
                  {{ $profile->academic_qualification }}
                </textarea>

               @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Professional  Qualification
                </h6>
              </div>
              <div class="col-sm-9 text-secondary">
                @foreach($all_profile as $profile)
                <textarea id="professional_qualification" name="professional_qualification" class="form-control">
                  {{ $profile->professional_qualification }}
                </textarea>
               @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Experience
                </h6>
              </div>
              <div class="col-sm-9 text-secondary">
                @foreach($all_profile as $profile)
                <textarea id="experience" name="experience" class="form-control">
                  {{ $profile->experience }}
                </textarea>
               @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>








    </div>
  </div>

<!-- /.container-fluid -->


</form>

<!--/*/*/**************************** /.container-fluid -->



@endsection
