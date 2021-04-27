<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/registration',function () {
//     return view('registration.index');
// });

Route::get('admin/logo','Admin\DashboardController@logo')->name('logo');
Route::post('admin/logo','Admin\DashboardController@logostore')->name('logo.store');


Route::get('/registration', 'RegistrationsController@register')->name('registration');

Route::post('/registration/store', 'RegistrationsController@store')->name('registration.store');

Route::get('/registration/show', 'RegistrationsController@show')->name('registration.show');


Route::get('/a', function () {
   /* $startTime = Carbon\Carbon::parse('2020-02-11 04:04:26');
    $endTime = Carbon\Carbon::now();

     $totalDuration =  $endTime->format('H:%I:%S');
    //$totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S')." Minutes";
    //dd($endTime);
    */

   /* $startTime = Carbon\Carbon::now();
    $start = Carbon\Carbon::parse($startTime)->format('H.i');

    echo $start;
    */


});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('admin');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->middleware('clint');

//Route::get('download','Download\DownloadController@download')->name('file.download');


    Route::middleware(['auth','Admin'])->group(function (){
        Route::middleware('preventBackHistory')->group(function (){
            ///////////////////////////////////


            Route::get('admin/user', 'Admin\UserController@userIndex')->name('admin.userIndex');
            Route::get('admin/user/delete/{id}', 'Admin\UserController@destroy')->name('admin.destroy');

            //UserCreate
            Route::get('admin/user/registration', 'Admin\UserController@employeeRegistration')->name('admin.userCreate');
            Route::post('admin/user/registration', 'Admin\UserController@store')->name('admin.userCreate');

            //userIndexList
            Route::get('admin/user/list', 'Admin\UserController@employeeInactiveList')->name('admin.inactive');

            //ManageEmployee
            Route::get('admin/manage-employee', 'Admin\EmployeeController@employeeIndex')->name('admin.employeeIndex');
            Route::get('admin/manage-employee/view/{id}', 'Admin\EmployeeController@employeeView')->name('admin.employeeView');
            Route::get('admin/manage-employee/edit/{id}', 'Admin\EmployeeController@employeeEdit')->name('admin.employeeEdit');
            Route::post('admin/manage-employee/edit/{id}', 'Admin\EmployeeController@employeeUpdate')->name('admin.employeeEdit');

            //Employee Disable
            Route::get('admin/manage-employee/disable/{id}', 'Admin\EmployeeController@employeeDisable')->name('admin.employeeDisable');
            Route::post('admin/manage-employee/delete/{id}', 'Admin\EmployeeController@EmployeeDelete')->name('admin.EmployeeDelete');

            //Event Management
            Route::get('fullcalender', 'Admin\EventController@index')->name('admin.event');
            Route::post('fullcalenderAjax', 'Admin\EventController@ajax')->name('admin.eventAjax');

            //Route::get('admin/event/fullcalender', [FullCalenderController::class, 'index'])->name(admin.event);
            //Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

            ///client message
            Route::get('admin/messages','ClientMessage\ClientMessageController@adminmessage')->name('admin.message');
            Route::get('admin/deletemessages/{id}','ClientMessage\ClientMessageController@delete')->name('admin.deletemessage');
            //project client
            Route::get('admin/clientprojects','Admin\ClientProjectController@index')->name('admin.clientproject');
            Route::get('admin/addclientproject','Admin\ClientProjectController@addclientproject')->name('admin.addclientproject');
            Route::post('admin/addclientproject','Admin\ClientProjectController@store')->name('admin.storeclientproject');

            Route::get('admin/deleteclientproject/{id}','Admin\ClientProjectController@destroy')->name('admin.deleteclientproject');

            //profile
            Route::get('admin/profile/{id}','Admin\EmployeeController@employeeView')->name('admin.profile');

            /////////////////////////////

            Route::get('admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard');

            //Route::resource('admin/user','Admin\UserController');
            Route::get('admin/user/edit/{id}','Admin\UserController@edit')->name('admin.useredit');
            Route::post('admin/user/edit','Admin\UserController@update')->name('admin.updateuser');
            Route::get('admin/attendance','Admin\AttendanceController@index')->name('admin.attendancelist');
            Route::get('admin/attendanceform','Admin\AttendanceController@attendanceform')->name('admin.attendanceform');
            Route::post('admin/attendanceform','Admin\AttendanceController@store')->name('admin.attendancestore');
            Route::post('admin/attendancetimeout','Admin\AttendanceController@update')->name('admin.attendanceupdate');

            //payroll
            Route::get('admin/addpayroll','Admin\PayrollController@addpayroll')->name('admin.addpayroll');
            Route::get('admin/payrolllist','Admin\PayrollController@index')->name('admin.payrolllist');
            Route::get('admin/payment/{id}','Admin\PayrollController@payment')->name('admin.addpayment');
            Route::post('admin/payment/{id}','Admin\PayrollController@filterbydate')->name('admin.filterbydate');
            Route::post('admin/pay/{id}','Admin\PayrollController@store')->name('admin.pay');
            Route::get('admin/payment/edit/{id}','Admin\PayrollController@edit')->name('admin.paymentedit');
            Route::post('admin/payment/edit/{id}','Admin\PayrollController@update')->name('admin.paymentupdate');
            Route::get('admin/payment/delete/{id}/{uid}','Admin\PayrollController@destroy')->name('admin.paymentdelete');
            //workspace
            Route::get('admin/workspace','Admin\WorkspaceController@index');
            Route::get('admin/workspacetable','Admin\WorkspaceController@workspacetable');
            Route::get('admin/editworkspace/{id}','Admin\WorkspaceController@edit');
            Route::post('admin/editworkspace/{id}','Admin\WorkspaceController@update');

            //Route::get('admin/workspace','Admin\WorkspaceController@index')->name('admin.workspace');
            Route::post('admin/addworkspace','Admin\WorkspaceController@store');
            Route::post('admin/deleteworkspace/{id}','Admin\WorkspaceController@delete');


            //projects
            Route::get('admin/projecttable/{id}','Admin\ProjectController@projecttable');
            Route::get('admin/workspace/view/{id}','Admin\ProjectController@index');

            //Route::post('admin/workspace/view/{id}','Admin\ProjectController@store');
            Route::post('admin/addproject','Admin\ProjectController@store');
            Route::post('admin/deleteproject/{id}','Admin\ProjectController@delete');
            Route::get('admin/editproject/{id}','Admin\ProjectController@edit');
            Route::post('admin/updateproject/{id}','Admin\ProjectController@update');

            Route::get('admin/workspace/{wid}/project/view/{id}','Admin\ProjectController@projectview');
            //Route::post('admin/workspace/{wid}/project/view/{id}','Admin\ProjectController@projectviewx');

            //task
            Route::post('admin/addtask','Admin\TaskController@store');
            Route::get('admin/inprogtask','Admin\TaskController@inprogress');
            Route::get('admin/todo','Admin\TaskController@todo');
            Route::get('admin/finished','Admin\TaskController@finished');
            Route::get('admin/edittask/{id}','Admin\TaskController@edit');
            Route::post('admin/deletetask/{id}','Admin\TaskController@delete');
            Route::post('admin/updatetask/{id}','Admin\TaskController@update');


            //alaminbro

            Route::resource('admin/file-management','Admin\FileManagementController');
            Route::resource('admin/client','Admin\ClientController');
            Route::get('admin/register-client','Admin\RegisterClientController@show')->name('register-client.info');
            Route::post('files/delete-all','Admin\DeleteAllController@delete')->name('delete.all');
            Route::post('files/delete-all','Admin\DeleteAllController@delete')->name('delete.all');
            //endalamin



            Route::group(['prefix' => 'trainer'], function () {
                Route::get('/', 'TrainersController@index')->name('trainer.index');
                Route::get('/show', 'TrainersController@show')->name('trainer.show');
                Route::get('/create', 'TrainersController@create')->name('trainer.create');
                Route::post('/store', 'TrainersController@store')->name('trainer.store');
                Route::get('/edit/{id}', 'TrainersController@edit')->name('trainer.edit');
                Route::post('/update/{id}', 'TrainersController@update')->name('trainer.update');
                Route::post('/delete/{id}', 'TrainersController@delete')->name('trainer.delete');
            });


            Route::group(['prefix' => 'department'], function () {
                Route::get('/', 'DepartmentsController@index')->name('department.index');
                Route::get('/create', 'DepartmentsController@create')->name('department.create');
                Route::post('/store', 'DepartmentsController@store')->name('department.store');
                Route::get('/edit/{id}', 'DepartmentsController@edit')->name('department.edit');
                Route::post('/update/{id}', 'DepartmentsController@update')->name('department.update');
                Route::post('/delete/{id}', 'DepartmentsController@delete')->name('department.delete');
            });

            Route::group(['prefix' => 'course'], function () {
                Route::get('/', 'CoursesController@index')->name('course.index');
                Route::get('/create', 'CoursesController@create')->name('course.create');
                Route::post('/store', 'CoursesController@store')->name('course.store');
                Route::get('/edit/{id}', 'CoursesController@edit')->name('course.edit');
                Route::post('/update/{id}', 'CoursesController@update')->name('course.update');
                Route::post('/delete/{id}', 'CoursesController@delete')->name('course.delete');
            });

            Route::group(['prefix' => 'student'], function () {
                Route::get('/', 'StudentsController@index')->name('student.index');
                Route::get('/create', 'StudentsController@create')->name('student.create');
                Route::post('/store', 'StudentsController@store')->name('student.store');
                Route::get('/edit/{id}', 'StudentsController@edit')->name('student.edit');
                Route::post('/update/{id}', 'StudentsController@update')->name('student.update');
                Route::post('/delete/{id}', 'StudentsController@delete')->name('student.delete');
            });

            Route::group(['prefix' => 'enroll'], function () {
                Route::get('/', 'EnrollsController@index')->name('enroll.index');
                Route::get('/create', 'EnrollsController@create')->name('enroll.create');
                Route::post('/store', 'EnrollsController@store')->name('enroll.store');
                Route::get('/edit/{id}', 'EnrollsController@edit')->name('enroll.edit');
                Route::post('/update/{id}', 'EnrollsController@update')->name('enroll.update');
                Route::post('/delete/{id}', 'EnrollsController@delete')->name('enroll.delete');

                Route::post('/enroll/search/','EnrollsController@search')->name('enroll.student');
            });


            //yeasin bro


Route::get('/category/',[App\Http\Controllers\Category\CategoryController::class,'create']);
Route::post('/category/save',[App\Http\Controllers\Category\CategoryController::class,'store'])->name('category.save');
Route::get('/category/show/',[App\Http\Controllers\Category\CategoryController::class,'index'])->name('category.show');
Route::get('/category/delete/',[App\Http\Controllers\Category\CategoryController::class,'destroy']);


Route::get('/expense/',[App\Http\Controllers\Expensive\ExpensiveController::class,'create']);
Route::post('/expense/add',[App\Http\Controllers\Expensive\ExpensiveController::class,'store'])->name('expense.add');
Route::get('/expense/view',[App\Http\Controllers\Expensive\ExpensiveController::class,'index'])->name('expense.view');
Route::get('/expense/delete/',[App\Http\Controllers\Expensive\ExpensiveController::class,'destroy']);


Route::get('/income/',[App\Http\Controllers\Income\IncomeController::class,'create']);
Route::post('/income/insert',[App\Http\Controllers\Income\IncomeController::class,'store'])->name('income.insert');
Route::get('/income/get',[App\Http\Controllers\Income\IncomeController::class,'index'])->name('income.get');
Route::get('/income/views/', [App\Http\Controllers\Income\IncomeController::class,'viewdata']);
Route::get('/income/deleted/',[App\Http\Controllers\Income\IncomeController::class,'destroy']);






            //Asset
            Route::get('admin/assetType','Admin\AssetController@AssetTypeView')->name('admin.assetType');
            Route::get('admin/assetTypeTable','Admin\AssetController@AssetTypeTable');

            Route::post('admin/add-assetType', 'Admin\AssetController@addAssetType')->name('admin.assetTypeTable');
            Route::post('admin/delete-assetType/{id}', 'Admin\AssetController@destroy')->name('admin.delete-assetType');

            Route::get('admin/edit-assetType/{id}', 'Admin\AssetController@editAssetType')->name('admin.ediit-assetType');
            Route::post('admin/edit-assetType/{id}', 'Admin\AssetController@updateAssetType')->name('admin.update-assetType');

            //Equipment
            Route::get('admin/equipmentTable','Admin\AssetController@equipmentTable');
            Route::post('admin/add-equipment', 'Admin\AssetController@addEquipment')->name('admin.add-equipment');
            Route::post('admin/delete-equipment/{id}', 'Admin\AssetController@deleteEquipment')->name('admin.delete-equipment');
            Route::get('admin/edit-equipment/{id}', 'Admin\AssetController@editEquipment')->name('admin.edit-equipment');
            Route::post('admin/edit-equipment/{id}', 'Admin\AssetController@updateEquipment')->name('admin.update-equipment');


            //Leave
            Route::get('admin/addLeaveType',function (){
                return view('admin/leave/addLeaveType');
            })->name('admin.addLeaveType');

            Route::get('admin/LeaveTypeTable','Admin\LeaveController@LeaveTypeTable');
            Route::post('admin/add-leaveType', 'Admin\LeaveController@addLeaveType');


           // Route::get('admin/leaveRequest', 'Admin\LeaveController@index')->name('admin.leaveRequest');

            Route::get('admin/leaveRequeste',function (){
                return view('admin/leave/leaveRequest');
            })->name('admin.leaveRequest');

            //admin/LeaveRequestTable
            Route::get('admin/LeaveRequestTable','Admin\LeaveController@leaveRequestTable');

            ///admin/approve-LeaveRequest/
            Route::post('admin/approve-LeaveRequest/{id}', 'Admin\LeaveController@approveLeaveRequest')->name('admin.approve-leaveRequest');

            Route::post('admin/decline-LeaveRequest/{id}', 'Admin\LeaveController@declineLeaveRequest')->name('admin.decline-leaveRequest');


            Route::post('admin/delete-leaveType/{id}', 'Admin\LeaveController@deleteLeaveType')->name('admin.delete-leaveType');

            //leavrType Edit

            Route::get('admin/edit-LeaveType/{id}', 'Admin\LeaveController@editLeaveType')->name('admin.edit-leaveType');

            Route::post('admin/edit-LeaveType/{id}', 'Admin\LeaveController@updateLeaveType')->name('admin.edit-leaveType');




            Route::get('admin/equipment','Admin\AssetController@equipmentView')->name('admin.equipment');
            Route::post('admin/equipment','Admin\AssetController@addEquipment')->name('admin.equipment');

            Route::get('admin/assetAssignment',function (){
                return view('admin/asset/assetAssignment');
            })->name('admin.assetAssignment');

            Route::get('admin/assetList','Admin\AssetController@index')->name('admin.assetList');


            //department and desig
             //Department
        Route::get('admin/addDepartment', function () {
            return view('admin/department/department');
        })->name('admin.addDepartment');

        Route::get('admin/departmentTable', 'Admin\DepartmentController@DepartmentTable');

        Route::post('admin/add-department', 'Admin\DepartmentController@addDepartment');
        //
        Route::post('admin/delete-department/{id}', 'Admin\DepartmentController@deleteDepartment')->name('admin.delete-department');
        Route::get('admin/edit-department/{id}', 'Admin\DepartmentController@editDepartment')->name('admin.edit-department');
        Route::post('admin/edit-department/{id}', 'Admin\DepartmentController@updateDepartment')->name('admin.update-department');

        //Designation
        Route::get('admin/addDesignation', function () {
            return view('admin/department/designation');
        })->name('admin.addDesignation');

        Route::get('admin/designationTable', 'Admin\DepartmentController@designationTable');

        Route::post('admin/add-designation', 'Admin\DepartmentController@adddesignation');
        //
        Route::post('admin/delete-designation/{id}', 'Admin\DepartmentController@deletedesignation')->name('admin.delete-designation');
        Route::get('admin/edit-designation/{id}', 'Admin\DepartmentController@editdesignation')->name('admin.edit-designation');
        Route::post('admin/edit-designation/{id}', 'Admin\DepartmentController@updatedesignation')->name('admin.update-designation');
    });










        Route::get('file/download/{file}','Admin\DownloadController@download')->name('file.download');

    });


    Route::middleware(['auth','Employee'])->group(function (){
        Route::middleware('preventBackHistory')->group(function (){

            Route::get('employee/dashboard', 'Employee\DashboardController@index')->name('employee.dashboard');
            Route::get('employee/file-list/{id}','Employee\FileManagementController@show')->name('empolyee.files');

            Route::get('client/info/{id}','Client\ClientInfoController@show')->name('client.info');

            Route::resource('client/message','ClientMessage\ClientMessageController');

            Route::get('employee/attendance','Employee\AttendanceController@index')->name('employee.attendancelist');
            Route::get('employee/attendanceform','Employee\AttendanceController@attendanceform')->name('employee.attendanceform');
            Route::post('employee/attendanceform','Employee\AttendanceController@store')->name('employee.attendancestore');
            Route::post('employee/attendancetimeout','Employee\AttendanceController@update')->name('employee.attendanceupdate');


            Route::get('employee/leave','Employee\LeaveController@index')->name('empolyee.leave');

            ///employee/LeaveRequestTable
            Route::get('employee/LeaveRequestTable/{id}','Employee\LeaveController@LeaveRequestTable');

            //employee/add-leaveRequest
            Route::post('employee/add-leaveRequest', 'Employee\LeaveController@addLeaveRequest')->name('employee.add-leaveRequest');

            //edit-LeaveRequest
            Route::get('employee/edit-LeaveRequest/{id}', 'Employee\LeaveController@editLeaveRequest')->name('employee.edit-leaveRequest');
            Route::post('employee/edit-LeaveRequest/{id}', 'Employee\LeaveController@updateLeaverequest')->name('employee.edit-leaveRequest');

            //Delete Leave Request

            Route::post('employee/delete-leaveRequest/{id}', 'Employee\LeaveController@deleteLeaveRequest')->name('employee.delete-leaveRequest');

            //tasks
            Route::get('employee/tasks','Employee\TaskController@index')->name('employee.tasks');

            //profile
            Route::get('employee/profile','Employee\ProfileController@index')->name('employee.profile');
            Route::get('employee/edit/{id}','Employee\ProfileController@edit')->name('employee.edit');
            Route::post('employee/edit/{id}','Employee\ProfileController@update')->name('employee.edit');


            Route::get('markAsRead', function(){
                auth()->user()->unreadNotifications->markAsRead();
                return redirect()->back();
            })->name('markread');

        });
        Route::get('employee/file-download/{file}','Employee\DownloadController@download')->name('employee.file.download');


    });


    Route::middleware(['auth','Client'])->group(function (){
        Route::middleware('preventBackHistory')->group(function (){

            Route::get('client/dashboard','Client\DashboardController@index')->name('client.dashboard');
            Route::get('client/send','ClientMessage\ClientMessageController@create')->name('client.addmessage');
            Route::post('client/send','ClientMessage\ClientMessageController@store')->name('client.storemessage');
            Route::get('client/messages','ClientMessage\ClientMessageController@index')->name('client.message');
            Route::get('client/deletemessages/{id}','ClientMessage\ClientMessageController@destroy')->name('client.deletemessage');

            Route::get('client/project','Admin\ClientProjectController@client')->name('client.project');
        });

    });



    Route::get('file/download/{file}','Admin\DownloadController@download')->name('file.download');
    Route::view('accessdenied','errors.access')->name('accessdenied');
