@extends('employee.employee-layouts.master')

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
      <!-- <div class="card mt-3">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg></h6>
            <span class="text-secondary">https://bootdey.com</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></h6>
            <span class="text-secondary">bootdey</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></h6>
            <span class="text-secondary">@bootdey</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></h6>
            <span class="text-secondary">bootdey</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></h6>
            <span class="text-secondary">bootdey</span>
          </li>
        </ul>
      </div> -->
    </div>
    <div class="row-md-8" style="display: flex;width: 100%; margin-left: -11px;">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body"  style="padding: 0.85rem;margin-bottom:14px">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <input name="full_name" class="form-control" type="text" placeholder="Name" value="{{ auth()->user()->name }}">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <input name="nid" class="form-control" type="text" placeholder="nid" value="{{ auth()->user()->email }}" disabled>
                  
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Mobile</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="contact" class="form-control" type="number" placeholder="contact" value="{{ $profile->contact }}">
                
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
                <input name="age" class="form-control" type="number" placeholder="age" value="{{ $profile->age }}">
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
                <input name="emergency_contact" class="form-control" type="number" placeholder="	emergency_contact" value="{{ $profile->emergency_contact }}">
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
      
  
          </div>
        </div>
        
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" style="padding: 0.85rem; margin-bottom:14px">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Joining Date</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                <input name="joining_date" class="form-control" type="date" placeholder="joining_date" value="{{ $profile->joining_date }}" disabled>   

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
                <input name="present_address" class="form-control" type="text" placeholder="present_address" value="{{ $profile->present_address }}">                 
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
                <input name="permanent_address" class="form-control" type="text" placeholder="permanent_address" value="{{ $profile->permanent_address }}">                
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
                <input name="nid" class="form-control" type="number" placeholder="nid" value="{{ $profile->nid }}">                  
                 @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Department</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                
                  @foreach($all_profile as $profile )
                  <input name="nid" class="form-control" type="text" value="{{ $profile->department }}" disabled>
                @endforeach
              
          
               
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0"> Designation</h6>
              </div>
              <div class="col-sm-8 text-secondary">
               
                  @foreach($all_profile as $profile )
                  <input name="nid" class="form-control" type="text" value="{{ $profile->designation }}" disabled>
                  @endforeach
             
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
@endsection