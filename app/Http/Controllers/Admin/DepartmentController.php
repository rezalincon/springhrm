<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Designation;


class DepartmentController extends Controller
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
    
    public function DepartmentTable()
    {
        $all_department = Department::all();
        //return response()->json('DT');
        return response()->json(['data'=>$all_department]);

        
    }
    public function addDepartment(Request $request)
    {
        // $this->validate($request, [
        //     'equipment_name'=> 'required',
        //     'asset_type'    => 'required',
        //     'quantity'      => 'required',
        //     'price'         => 'required',
        // ]);
        //$total = $request->quantity * $request->price;
        
        Department::create([
            'dept_name'=> $request->dept_name,
        ]);
        return response()->json('success');
        
        
    }

    public function deleteDepartment($id)
    {
        $data = Department::find($id);
        $data->delete();
        return response()->json('success');
    }
    public function editDepartment($id)
    {
        $data = Department::find($id);
        return [
            'id'            => $data->id,
            'dept_name'=> $data->dept_name,
        ];
    }
    public function updateDepartment(Request $request, $id)
    {

        $edit_data = Department::find($id);
        $edit_data->dept_name = $request->dept_name;
        $edit_data->update();
        return response()->json('Updated');
    }

    
    //Designation
    
    public function designationTable()
    {
        $all_designation = Designation::all();
        //return response()->json('DT');
        return response()->json(['data'=>$all_designation]);

        
    }
    public function adddesignation(Request $request)
    {
        // $this->validate($request, [
        //     'equipment_name'=> 'required',
        //     'asset_type'    => 'required',
        //     'quantity'      => 'required',
        //     'price'         => 'required',
        // ]);
        //$total = $request->quantity * $request->price;
        
        Designation::create([
            'designation_name'=> $request->designation_name,
        ]);
        return response()->json('success');
        
        
    }

    public function deletedesignation($id)
    {
        $data = Designation::find($id);
        $data->delete();
        return response()->json('success');
    }
    public function editdesignation($id)
    {
        $data = Designation::find($id);
        return [
            'id'            => $data->id,
            'designation_name'=> $data->designation_name,
        ];
    }
    public function updatedesignation(Request $request, $id)
    {

        $edit_data = Designation::find($id);
        $edit_data->designation_name = $request->designation_name;
        $edit_data->update();
        return response()->json('Updated');
    }

}