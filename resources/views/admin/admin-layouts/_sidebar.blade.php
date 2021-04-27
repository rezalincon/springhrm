<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <div class="container mt-3 mb-3 justify-content-center" style="margin-left: auto">
        <img src="{{asset('images/logo/logo.png')}}"  style="margin-left: auto;  margin-right:auto;" alt="" width="100px" width="50px" align="center">
    </div>


    <!-- Sidebar - Brand -->
    {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB uuuAdmin <sup>2</sup></div>
    </a> --}}

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Employee Management
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsDept"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Departent</span>
        </a>
        <div id="collapsDept" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File-Management System</h6>

                <a class="collapse-item" href="{{route('admin.addDepartment')}}">Department</a>
                <a class="collapse-item" href="{{route('admin.addDesignation')}}">Designation</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Employees</span>
        </a>
        <div id="collapseEmp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Employee Management </h6>
                <a class="collapse-item" href="{{route('admin.employeeIndex')}}"> Employee List</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Accounts
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa fa-dollar-sign"></i>
            <span>Income</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Incomes:</h6>
                <a class="collapse-item" href="{{url('/income/get')}}">Add Income Category</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Expense</span>
        </a>
        <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Expensive:</h6>
                <a class="collapse-item" href="{{url('/category/show/')}}">Add Expense Category</a>
                <a class="collapse-item" href="{{url('/expense/')}}">Add Expensive</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span>Attendance Manage.</span>
        </a>
        <div id="collapseAttendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Attendance Management</h6>
                <a class="collapse-item" href="{{route('admin.attendanceform')}}">Add Attendance</a>
                <a class="collapse-item" href="{{route('admin.attendancelist')}}">Attendance List</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">

     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoq"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Payroll Manage.</span>
        </a>
        <div id="collapseTwoq" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payroll Management</h6>

                <a class="collapse-item" href="{{route('admin.addpayroll')}}">add payroll</a>
                <a class="collapse-item" href="{{route('admin.payrolllist')}}">payroll list</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorkspace"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span> Project & Tasks</span>
        </a>
        <div id="collapseWorkspace" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Management</h6>
                <a class="collapse-item" href="/admin/workspace">Workspace</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFile"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>File Management</span>
        </a>
        <div id="collapseFile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File-Management System</h6>
                <a class="collapse-item" href="{{route('file-management.create')}}">Add File</a>
                <a class="collapse-item" href="{{route('file-management.index')}}">File List</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Course Management</span>
        </a>
        <div id="collapseo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('trainer.index')}}">Trainer List</a>
                {{-- <a class="collapse-item" href="{{route('trainer.show')}}">Trainer List</a> --}}

            </div>

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('department.index')}}">Department List</a>
            </div>

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('course.index')}}">Course List</a>
            </div>

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('student.index')}}">Student List</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('enroll.index')}}">Enroll List</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">




   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>User Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User-Management System</h6>

                <a class="collapse-item" href="{{route('admin.userIndex')}}">Register New User</a>
                <a class="collapse-item" href="{{route('admin.inactive')}}">User List</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">





    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Event Management</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Event Management System</h6>
                <a class="collapse-item" href="{{route('admin.event')}}">Manage Event</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">







     <!-- Nav Item - Assets -->

     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsset"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Assets</span>
        </a>
        <div id="collapseAsset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File-Management System</h6>

                <a class="collapse-item" href="{{route('admin.assetType')}}">Assset Type</a>
                <a class="collapse-item" href="{{route('admin.equipment')}}">Equipment</a>
                <!-- <a class="collapse-item" href="{{route('admin.assetAssignment')}}">Asset assignment</a> -->

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Leave request-->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Leave</span>
        </a>
        <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File-Management System</h6>

                <a class="collapse-item" href="{{route('admin.addLeaveType')}}">Add Leave Type</a>
                <a class="collapse-item" href="{{route('admin.leaveRequest')}}">Leave request</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">






<!--Alamin-->



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClient"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Client</span>
        </a>
        <div id="collapseClient" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Client</h6>
                <a class="collapse-item" href="{{route('client.create')}}">Add Client</a>
                <a class="collapse-item" href="{{route('client.index')}}">Client List</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRC"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Registered Client</span>
        </a>
        <div id="collapseRC" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Registered Client</h6>
                <a class="collapse-item" href="{{route('register-client.info')}}">Client Info</a>
                <a class="collapse-item" href="{{route('admin.message')}}">Client Message</a>
                <a class="collapse-item" href="{{route('admin.clientproject')}}">Client Project</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselogo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
        </a>
        <div id="collapselogo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Setting</h6>
                <a class="collapse-item" href="{{route('logo')}}"> Change Logo</a>

            </div>
        </div>
    </li>




    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
           aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dept. Management</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Dept. Management System</h6>

                <a class="collapse-item" href="{{route('department.index')}}">Department List</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
           aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Course Management</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Course Management System</h6>

                <a class="collapse-item" href="{{route('course.index')}}">Course List</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
           aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-cog"></i>
            <span>Student Management</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Student Management System</h6>

                <a class="collapse-item" href="{{route('student.index')}}">Student List</a>
            </div>
        </div>
    </li> --}}

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
