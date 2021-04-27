<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Enroll;
use App\Trainer;
use App\EduDepartment;

use Intervention\Image\Facades\Image;
use File;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        $laravel = Enroll::where('course_id','1')->get();
        $javascript = Enroll::where('course_id','2')->get();
        $python = Enroll::where('course_id','3')->get();
        return view('courses.index', compact('courses','laravel', 'javascript', 'python'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = EduDepartment::get();
        return view('courses.create', compact('departments'));
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

        $course = new Course();
        $course->name = $request->name;
        $course->department_id = $request->department_id;
        $course->description = $request->description;

        $course->save();
        session()->flash('success', 'Course added successfully');
        return redirect()->route('course.index');
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
        $course = Course::find($id);
        $departments = EduDepartment::get();
        return view('courses.edit', compact('course', 'departments'));
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

        $course = Course::find($id);
        $course->name = $request->name;
        $course->department_id = $request->department_id;
        $course->description = $request->description;

        $course->save();

        session()->flash('success', 'Course updated successfully');
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $course = Course::find($id);

        $course->delete();


        session()->flash('success', 'Course deleted successfully');
        return redirect()->route('course.index');
    }
}
