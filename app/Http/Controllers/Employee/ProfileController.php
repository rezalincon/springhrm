<?php

namespace App\Http\Controllers\Employee;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeInfo;
use App\Department;
use App\Designation;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  Auth::user()->id;
        $all_profile = EmployeeInfo::where('user_id', $id)->get();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        //return $all_profile;
        return view('employee.profile.profile', compact('all_profile', 'all_department', 'all_designation'));
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
        $all_profile = EmployeeInfo::where('user_id', $id)->get();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        //return $all_profile;
        return view('employee.profile.profileEdit', compact('all_profile', 'all_department', 'all_designation'));
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

        $id =  Auth::user()->id;
        $edit_data = EmployeeInfo::where('user_id', $id)->get();
        //return $edit_data;

        if ($request->hasFile('photo')) {
            $edit_img = $request->file('photo');
            $edit_photo_uname = md5(time() . rand()) . '.' . $edit_img->getClientOriginalExtension();
            $edit_img->move(public_path('files/uploads'), $edit_photo_uname);
            //unlink('files/uploads' . $edit_data->avatar);
        } else {
            $edit_photo_uname = $edit_data[0]->avatar;
        }

        $edit_data[0]->avatar = $edit_photo_uname;
        $edit_data[0]->full_name = $request->full_name;
        $edit_data[0]->contact = $request->contact;
        $edit_data[0]->emergency_contact = $request->emergency_contact;
        $edit_data[0]->age = $request->age;
        $edit_data[0]->gender = $request->gender;
        $edit_data[0]->nid = $request->nid;
        $edit_data[0]->present_address = $request->present_address;
        $edit_data[0]->permanent_address = $request->permanent_address;
        //$edit_data[0]->joining_date = $request->joining_date;
        //$edit_data->marital_status = $request->
        $edit_data[0]->academic_qualification = $request->academic_qualification;
        $edit_data[0]->professional_qualification = $request->professional_qualification;
        $edit_data[0]->experience = $request->experience;
        $edit_data[0]->update();

        if ($request->full_name != null) {
            $edit_data = User::find($id);
            $edit_data->name = $request->full_name;
            $edit_data->update();
        }

        Alert::success('Success', 'Profile Updated Successfully');
        return redirect()->route('employee.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
