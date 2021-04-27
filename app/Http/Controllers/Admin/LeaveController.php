<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaveType;
use App\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_leaveRequest = Leave::all();
        // return view('admin/leave/leaveRequest',compact('all_leaveRequest',$all_leaveRequest));
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
    public function destroy($id)
    {
        //
    }

    public function LeaveTypeTable()
    {
        $all_laeveType = LeaveType::all();
        //return response()->json('DT');
        return response()->json(['data'=>$all_laeveType]);   
    }

    
    public function addLeaveType(Request $request)
    {
        Leavetype::create([
            'leavetype'   => $request->leave_type,
            'limit'       => $request->total_leave_days,
            'percalendar' => $request->percalender
        ]);

        return response()->json('success');
             
    }

    public function leaveRequestTable()
    {
        $all_leaveRequest = Leave::all();
        //return response()->json('DT');
        return response()->json(['data'=>$all_leaveRequest]);

        
    }
    
    public function approveLeaveRequest($id)
    {
        $edit_data = Leave::find($id);
        $edit_data->status = 'approve';
        $edit_data->update();
        return response()->json('Updated');


    }

    
    public function declineLeaveRequest($id)
    {
        $edit_data = Leave::find($id);
        $edit_data->status = 'decline';
        $edit_data->update();
        return response()->json('Updated');


    }
    
    public function deleteLeaveType($id)
    {
        $data = LeaveType::find($id);
        $data->delete();
        return response()->json('success');


    }
    public function editLeaveType($id)
    {
        $data = LeaveType::find($id);
        return [
            'leavetype' => $data->leavetype,
            'limit' => $data->limit,
            'percalendar' => $data->percalendar,
        ];
    }
    
    public function updateLeaveType(Request $request, $id)
    {

        $edit_data = LeaveType::find($id);
        $edit_data->leavetype = $request->leave_type;
        $edit_data->limit = $request->total_leave_days;
        $edit_data->percalendar = $request->percalender;
        $edit_data->update();
        return response()->json('Updated');
    }


}