<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Student;
use App\Trainer;
use App\Course;
use App\Enroll;

use Intervention\Image\Facades\Image;
use File;

class EnrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = Enroll::orderBy('id', 'desc')->paginate(10);
        return view('enrolls.index', compact('enrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $trainers = Trainer::get();
        $departments = Department::get();
        $courses = Course::get();
        return view('enrolls.create', compact('students', 'trainers', 'departments', 'courses'));
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
                // 'name' => 'required',
                'image' => 'mimes:png,jpg,jpeg,gif|required|max:100000',
            ],

            [
                'image.required'  => 'Please provide a valid image format image',
            ]
        );

        // $enroll = new Enroll();
        // $enroll->student_id = $request->student_id;
        // $enroll->trainer_id = $request->trainer_id;
        // $enroll->department_id = $request->department_id;
        // $enroll->course_id = $request->course_id;

        if (Enroll::where('student_id', $request->student_id)
                    ->where('course_id', $request->course_id)
                    ->first()) {

            session()->flash('success', 'Course already exists');
            return redirect()->route('enroll.index');
         }
         else{
            $enroll = new Enroll();
            $enroll->student_id = $request->student_id;
            $enroll->trainer_id = $request->trainer_id;
            $enroll->department_id = $request->department_id;
            $enroll->course_id = $request->course_id;

            if ($request->hasFile('image')) {
                $path = 'files/uploads/enrolls';
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $img);
                $enroll->image = $img;
            }

            $enroll->save();
            session()->flash('success', 'Data added successfully');
            return redirect()->route('enroll.index');
         }
        // if ($request->hasFile(key: 'image')) {
        //     $path = 'files/uploads/enrolls';
        //     $image = $request->file(key: 'image');
        //     $img = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move($path, $img);
        //     $enroll->image = $img;
        // }

        // $enroll->save();
        // session()->flash('success', 'Data added successfully');
        // return redirect()->route('enroll.index');
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
        $enroll = Enroll::find($id);
        $students = Student::get();
        $trainers = Trainer::get();
        $departments = Department::get();
        $courses = Course::get();
        return view('enrolls.edit', compact('enroll', 'students', 'trainers', 'departments', 'courses'));
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
            // 'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|nullable|max:100000',
        ]);

        if (Enroll::where('student_id', $request->student_id)
                    ->where('course_id', $request->course_id)
                    ->first()) {

            session()->flash('success', 'Course already exists');
            return redirect()->route('enroll.index');
         }
         else{
            $enroll = Enroll::find($id);
            $enroll->student_id = $request->student_id;
            $enroll->trainer_id = $request->trainer_id;
            $enroll->department_id = $request->department_id;
            $enroll->course_id = $request->course_id;

            if ($request->hasFile('image')) {
                $path = 'files/uploads/enrolls';
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $img);
                $enroll->image = $img;
            }

            $enroll->save();
            session()->flash('success', 'Data added successfully');
            return redirect()->route('enroll.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $enroll = Enroll::find($id);
        if (!is_null($enroll)) {
            if (File::exists('files/uploads/enrolls/' . $enroll->image)) {

                File::delete('files/uploads/enrolls/' . $enroll->image);
            }
            $enroll->delete();
        }

        // $enroll->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('enroll.index');
    }



}
