<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\EmployeeInfo;
use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of User';
        $data['users'] = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index', $data);
    }

    public function userIndex()
    {

        $data['title'] = 'List of Inactive Users';
        $data['users'] = User::orderBy('id', 'DESC')->get();
        //return $data;
        return view('admin.user.userIndex', $data);
    }
    //
    public function employeeInactiveList()
    {

        $user = User::get();
        // $data['title'] = 'List of Inactive Users';
        // $data['users'] = User::where('status', '0')->orderBy('id', 'DESC')->get();
        //return $data;
        //dd($user);
        return view('admin.user.userIndexList', compact('user'));
    }
    public function employeeRegistration()
    {

        $data['title'] = 'Add New User';
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        //return $all_profile;

        return view('admin.user.userRegistration', compact('data', 'all_department', 'all_designation'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['title'] = 'Add New User';
        // $all_department = Department::all('dept_name');

        // $all_designation = Designation::all('designation_name');

        // //return $all_profile;

        // return view('admin.user.employeeCreate', compact('data', 'all_department', 'all_designation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type' => 'required|in:employee,client,student'
            ],
        );
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        //return $request->all();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->user_type,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        Alert::success('Success', 'User Created Successfully');
        return redirect()->route('admin.userIndex');
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
        $user = User::where('id', $id)->get();
        $all_department = Department::all();
        $all_designation = Designation::all();
        return view('admin.user.edit', compact('user', 'all_department', 'all_designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $checkEmployeeInfo = EmployeeInfo::where('user_id', $request->id)->get();

        if ($request->status == 1) {
            EmployeeInfo::UpdateorCreate([
                'user_id' => $request->id,
            ]);
            Alert::success('Success', 'User Updated Successfully');
            return redirect()->route('admin.inactive');
        }
        Alert::success('Success', 'User Updated Successfully');
        return redirect()->route('admin.inactive');


        // //return $checkEmployeeInfo;
        // if ($checkEmployeeInfo == null) {
        //     EmployeeInfo::create([
        //         'user_id' => $request->id,
        //         'designation' => $request->designation,
        //         'department' => $request->department
        //     ]);
        //     Alert::success('Success', 'User Updated Successfully');
        //     return redirect()->route('admin.userIndex');
        // } else {

        //     $edit_data = EmployeeInfo::where('user_id', $request->id)->get();

        //     $edit_data[0]->designation = $request->designation;
        //     $edit_data[0]->department = $request->department;
        //     $edit_data[0]->update();
        //     Alert::success('Success', 'User Updated Successfully');
        //     return redirect()->route('admin.userIndex');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "delete";
        User::destroy($id);
        Alert::success('Success', 'User Deleted Successfully');
        return redirect()->route('admin.userIndex');
    }



}
