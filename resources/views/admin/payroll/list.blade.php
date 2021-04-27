@extends('admin.admin-layouts.master')


@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payroll List</h6>
        </div>
        <div class="card-body">

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Monthly Salary</th>

                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($emp as $e)
                        <tr>
                            <td>{{ $e->user_id }}</td>
                            <td>{{ $e->name }}</td>
                            <td>{{ $e->department }}</td>
                            <td>
                            @if ($e->status==1)
                                    Active
                            @endif
                            @if ($e->status==0)
                            Deactive
                    @endif</td>
                            <td>{{ $e->salary }}</td>
                            <td><a class="btn btn-sm btn-success" href="{{ route('admin.addpayment',$e->user_id) }}" ><i class="fa fa-edit"  ></i></a></td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

@endsection
