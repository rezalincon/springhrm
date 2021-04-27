<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\EmployeeInfo;
use App\Department;
use App\Designation;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //
    public function employeeIndex()
    {

        $data['title'] = 'List of Employees';
        //$data['employees'] = EmployeeInfo::orderBy('id', 'DESC')->get();
        $data['employees'] = User::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->where('role','employee')
                            ->orwhere('role','admin')
                            ->get();


        //return( $data);
        return view('admin.manage-employee.employeeIndex', $data);
    }
    public function employeeEdit($id)
    {

        $all_profile = EmployeeInfo::where('id', $id)->get();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        //return $all_profile;
        return view('admin.manage-employee.employeeEdit', compact('all_profile', 'all_department', 'all_designation'));
    }
    //
    public function employeeUpdate(Request $request, $id)
    {
        //return $id;
        $edit_data = EmployeeInfo::find($id);
        //return $edit_data;

        if ($request->hasFile('photo')) {
            $edit_img = $request->file('photo');
            $edit_photo_uname = md5(time() . rand()) . '.' . $edit_img->getClientOriginalExtension();
            $edit_img->move(public_path('files/uploads'), $edit_photo_uname);
            //unlink('files/uploads' . $edit_data->avatar);
        } else {
            if ($edit_data->avatar != null) {
                $edit_photo_uname = $edit_data->avatar;
            } else {
                $edit_photo_uname = '';
            }
        }

        $edit_data->avatar = $edit_photo_uname;
        $edit_data->full_name = $request->full_name;
        $edit_data->contact = $request->contact;
        $edit_data->emergency_contact = $request->emergency_contact;
        $edit_data->age = $request->age;
        $edit_data->gender = $request->gender;
        $edit_data->dob = $request->dob;
        $edit_data->salary = $request->salary;
        $edit_data->nid = $request->nid;
        $edit_data->present_address = $request->present_address;
        $edit_data->permanent_address = $request->permanent_address;
        $edit_data->joining_date = $request->joining_date;
        $edit_data->department = $request->department;
        $edit_data->designation = $request->designation;
        $edit_data->marital_status = $request->marital_status;
        $edit_data->academic_qualification = $request->academic_qualification;
        $edit_data->professional_qualification = $request->professional_qualification;
        $edit_data->experience = $request->experience;
        $edit_data->update();

        if ($request->full_name != null && $request->email != null) {
            $edit_data = User::find($request->user_id);
            $edit_data->name = $request->full_name;
            $edit_data->email = $request->email;
            $edit_data->update();
        }


        Alert::success('Success', 'User Updated Successfully');
        return redirect()->route('admin.employeeIndex');
    }
    //
    public function employeeDisable($id)
    {
        $edit_data = User::find($id);
        $edit_data->status = 0;
        $edit_data->update();

        Alert::success('Success', 'Employee Disabled Successfully');
        return redirect()->route('admin.employeeIndex');


    }
    public function EmployeeDelete(Request $request, $id)
    {
        echo "employee_info: ";
        echo $request->user_id;





        $b = User::find($request->user_id);

        $b->projects()->detach();
        $b->tasks()->detach();
        $b->delete();


        $a = EmployeeInfo::find($id);
        $a->delete();




        Alert::success('Success', 'User Deleted Successfully');
        return redirect()->route('admin.employeeIndex');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function employeeView($id)
    {
        //$id =  Auth::user()->id;
        $all_profile = EmployeeInfo::join('users','users.id','=','employee_infos.user_id')->where('employee_infos.user_id', $id)->get();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        return view('admin.manage-employee.employeeprofile', compact('all_profile', 'all_department', 'all_designation'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


    }
    //

}
