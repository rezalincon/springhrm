<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EduDepartment;
use App\Course;

use Intervention\Image\Facades\Image;
use File;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = EduDepartment::orderBy('id', 'desc')->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $courses = Course::get();
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'nullable',
            ]
        );

        $department = new EduDepartment();
        $department->name = $request->name;
        $department->description = $request->description;

        $department->save();
        session()->flash('success', 'Department added successfully');
        return redirect()->route('department.index');
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
        $department = EduDepartment::find($id);
        // $courses = Course::get();
        return view('departments.edit', compact('department'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $department = EduDepartment::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        session()->flash('success', 'Department updated successfully');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $department = EduDepartment::find($id);
        $department->delete();


        session()->flash('success', 'Department deleted successfully');
        return redirect()->route('department.index');
    }
}
