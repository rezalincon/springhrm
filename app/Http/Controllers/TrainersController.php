<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Trainer;
use App\Course;

use Datatables;

use Image;
use File;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $course = Trainer::join('courses','courses.id', '=','trainers.id')->
        // select('*','courses.name')->get();
        $trainers = Trainer::orderBy('id', 'desc')->paginate(10);
        return view('trainers.index', compact('trainers'));
        // return Datatables::of(Trainer::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::get();
        return view('trainers.create', compact('courses'));
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
                'image' => 'mimes:png,jpg,jpeg,gif|nullable|max:100000',
            ],

            [
                'image.required'  => 'Please provide a valid image format image',
            ]
        );

        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->course_id = $request->course_id;
        $trainer->email = $request->email;
        $trainer->password = Hash::make($request->password);
        $trainer->phone = $request->phone;
        $trainer->sex = $request->sex;
        $trainer->birthday = $request->birthday;
        $trainer->description = $request->description;

        if ($request->hasFile('image')){
            $path = 'files/uploads/trainers';
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $trainer->image = $img;
        }

        $trainer->save();
        session()->flash('success', 'Trainer added successfully');
        return redirect()->route('trainer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show()
    // {

    //     return view('trainers.index');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainer = Trainer::find($id);
        $trainers = Trainer::get();
        $courses = Course::get();
        return view('trainers.edit', compact('trainer','trainers', 'courses'));
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

        $trainer = Trainer::find($id);
        $trainer->name = $request->name;
        $trainer->course_id = $request->course_id;
        $trainer->email = $request->email;
        $trainer->password = Hash::make($request->password);
        $trainer->phone = $request->phone;
        $trainer->sex = $request->sex;
        $trainer->birthday = $request->birthday;
        $trainer->description = $request->description;

        if ($request->hasFile('image')) {
            if (File::exists('files/uploads/trainers/' . $trainer->image)) {
                File::delete('files/uploads/trainers/' . $trainer->image);
            }
            $path = 'files/uploads/trainers';
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $trainer->image = $img;
        }
        $trainer->save();

        session()->flash('success', 'Trainer updated successfully');
        return redirect()->route('trainer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $trainer = Trainer::find($id);
        if (!is_null($trainer)) {
            if (File::exists('files/uploads/trainers/' . $trainer->image)) {

                File::delete('files/uploads/trainers/' . $trainer->image);
            }
            $trainer->delete();
        }

        session()->flash('success', 'Trainer deleted successfully');
        return redirect()->route('trainer.index');
    }
}
