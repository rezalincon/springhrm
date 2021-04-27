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
    <link href="{{asset('sb-admin-assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('sb-admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('sb-admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body class="bg-gradient-primary">
   <div class="table-responsive">
       <table class="table">
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Role</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
           </thead>

           <tbody>
               @foreach ($users as $user)
               <tr>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->role }}</td>
                   <td>
                       @if($user->status == 1)
                       <a href="" class="btn btn-success">Active</a>
                       @else
                       <a href="" class="btn btn-primary">Deactive</a>
                       @endif
                   </td>
                   <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                   </td>
               </tr>
                   
               @endforeach
           </tbody>
       </table>
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