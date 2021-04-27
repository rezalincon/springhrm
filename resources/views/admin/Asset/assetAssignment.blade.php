@extends('admin.admin-layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Assets</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-header">
            <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_doctor_modal">Assign Assets</a>
            <br>
            <br>
            <br>
        </div>
        <div style="width: 100%">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Equipment Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<div id="add_doctor_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Assets</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="" class="form-control" type="text" placeholder="Employee Name">
                    </div>
                    <div class="form-group">
                        <input name="type_name" class="form-control" type="text" placeholder="Equipment Name">
                    </div>
                    <div class="form-group">
                        <input name="type_name" class="form-control" type="date" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection