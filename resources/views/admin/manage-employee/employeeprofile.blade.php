@extends('admin.admin-layouts.master')

@section('content')



  <div class="row gutters-sm" style="width: 100%;margin-left: 10px;">
    <div class="row-md-4 mb-3" style="width: 100%;margin-right: 24px;">
      <div class="card">
        <div class="card-body d-flex">
          <div class="d-flex align-items-center" style="width:50%">

            @foreach($all_profile as $profile)
            <img src="/files/uploads/{{ $profile->avatar }}" alt="Admin" class="rounded-circle" width="65px" height="65px">

               @endforeach



            <div class="mt-3" style="margin-left: 15px">
              <h5> <strong>{{ $all_profile[0]->name }}</strong> </h5>
              <p class="text-secondary mb-1">
                {{ $all_profile[0]->department }}</p>

                <p class="text-secondary mb-1">
                   ID : {{ $all_profile[0]->id }}</p>
            </div>
          </div>
          <div class="justify-content-end" style="width: 50%;">

          </div>
        </div>
      </div>

    </div>
    <div class="row-md-8" style="display: flex;width: 100%; margin-left: -11px;">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body"  style="padding: 1.5rem;x">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Full Name<br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">
                  {{ $all_profile[0]->name }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Email <br>
                  <br> </h6>
              </div>
              <div class="col-sm-8 text-secondary">
                {{ $all_profile[0]->email }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Mobile <br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">
                {{ $all_profile[0]->contact }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Age <br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">
                {{ $all_profile[0]->age }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Emergency Contact</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                {{ $all_profile[0]->emergency_contact }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Gender  </h6>
              </div>
              <div class="col-sm-8 text-secondary">
                {{ $all_profile[0]->gender }}
              </div>
            </div>


          </div>
        </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" style="padding: 1.5rem;">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Joining Date <br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                {{ $profile->joining_date }}
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
                {{ $profile->present_address }}
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
                {{ $profile->permanent_address }}
                @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">NID Number <br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">
                @foreach($all_profile as $profile)
                {{ $profile->nid }}
                 @endforeach
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Department <br><br></h6>
              </div>
              <div class="col-sm-8 text-secondary">

                  @foreach($all_profile as $profile )
                {{ $profile->department }}
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
                {{ $profile->designation }}
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

                  {{ $profile->academic_qualification }}


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

                  {{ $profile->professional_qualification }}

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

                  {{ $profile->experience }}

               @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>








    </div>
  </div>

<!-- /.container-fluid -->


@endsection
