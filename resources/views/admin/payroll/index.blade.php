@extends('admin.admin-layouts.master')


@section('content')


<div class="row">
    <div class="container">

        <div class="col-md-12">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payment Information</h6>
                </div>
                <div class="card-body">
             <div class="responsive">


            <table class="table " width="100%">
                <thead>
                  <tr>
                    <th scope="col">Employee</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Monthly Salary</th>
                    <th scope="col">Deduction</th>
                    <th scope="col">Bonus</th>
                    <th scope="col">Total Salary</th>
                    <th scope="col">From Date</th>
                    <th scope="col">To Date</th>
                    <th scope="col">Approve_key</th>
                    <th scope="col">Comment</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($payroll as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->salary }}</td>
                        <td>{{ $p->deduction  }}</td>
                        <td>{{ $p->bonus  }}</td>
                        <td>{{ $p->total_salary  }}</td>
                        <td>{{ $p->fromdate  }}</td>
                        <td>{{ $p->enddate  }}</td>
                        <td>@if ($p->approve_key == 1)
                            Pending
                        @else
                            Done
                        @endif</td>
                        <td>{{ $p->comment  }}</td>

                    </tr>

                    @endforeach



                </tbody>
              </table>
                </div>
            </div>
            </div>




        </div>
    </div>
</div>


@endsection
