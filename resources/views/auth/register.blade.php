
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <link href="{{asset('sb-admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('Admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/css/custom.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('sb-admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('sb-admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<style>


</style>

<body class="bg-gradient-primary">
    <div class="image">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">




            <div class="col-xl-10 col-lg-12 col-md-9">



                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To <br> HRM & Payroll Software</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                        </div>
                                        <div class="form-group">
                                            <input id="email" placeholder="Enter Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                                {{ $message }}
                                              </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" placeholder="Enter Password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                    {{ $message }}
                                  </div>
                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @error('password')
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                    {{ $message }}
                                  </div>
                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <select class="col-md-12 col-form-label text-md-left" name="user_type" required>
                                                <option value="">-select-</option>
                                                <option value="employee">Employee</option>
                                                <option value="client">Client</option>
                                                <option value="student">Student</option>
                                            </select>
                                            @error('usert_type')
                                            <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                                {{ $message }}
                                              </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Registration') }}
                                        </button>
                                        <hr>
                                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Already Have  a Account ! Login Here</a>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>







{{--

@extends('layouts.app')

@section('content')

<link href="{{asset('Admin/css/custom.css')}}" rel="stylesheet">
<div class="image">


<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="User Type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                            <div class="col-md-6">
                                <select class="col-md-12 col-form-label text-md-left" name="user_type" required>
                                    <option value="">-select-</option>
                                    <option value="employee">Employee</option>
                                    <option value="client">Client</option>
                                    <option value="student">Student</option>
                                </select>
                                @error('usert_type')
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 5px;">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection --}}
