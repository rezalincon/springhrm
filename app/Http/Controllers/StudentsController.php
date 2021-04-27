<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\Trainer;
use App\Course;

use Intervention\Image\Facades\Image;
use File;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
                'email' => 'required',
                'sex' => 'required',
                'birthday' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'image' => 'mimes:png,jpg,jpeg,gif|required|max:100000',
            ],

            [
                'image.required'  => 'Please provide a valid image format image',
            ]
        );

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->sex = $request->sex;
        $student->birthday = $request->birthday;
        $student->phone = $request->phone;
        $student->address = $request->address;

        if ($request->hasFile('image')) {
            $path = 'files/uploads/students';
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $student->image = $img;
        }

        $student->save();
        session()->flash('success', 'Student added successfully');
        return redirect()->route('student.index');
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
        $student = Student::find($id);
        return view('students.edit', compact('student'));
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
            'image' => 'mimes:png,jpg,jpeg,gif|nullable|max:100000',
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->sex = $request->sex;
        $student->birthday = $request->birthday;
        $student->phone = $request->phone;
        $student->address = $request->address;

        if ($request->hasFile('image')) {
            if (File::exists('files/uploads/students/' . $student->image)) {
                File::delete('files/uploads/students/' . $student->image);
            }
            $path = 'files/uploads/students';
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $student->image = $img;
        }
        $student->save();

        session()->flash('success', 'Student updated successfully');
        return redirect()->route('student.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = Student::find($id);
        if (!is_null($student)) {
            if (File::exists('files/uploads/students/' . $student->image)) {

                File::delete('files/uploads/students/' . $student->image);
            }
            $student->delete();
        }

        session()->flash('success', 'Student deleted successfully');
        return redirect()->route('student.index');
    }
}
