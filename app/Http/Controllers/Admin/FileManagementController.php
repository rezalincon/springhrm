<?php

namespace App\Http\Controllers\Admin;

use App\FileManagement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FileManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of Files';
        $data ['files'] = FileManagement::orderBy('id','DESC')->paginate(5);
        return view('admin.file-management.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New File';
        $data['users'] = User::where('role','employee')->get();
        return view('admin.file-management.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'mimes:jpg,png,zip,doc,pdf'
        ]);

        $newFile = new FileManagement();

        $newFile->user_id = $request->employee_id;
        $newFile->title = $request->title;
        $newFile->description = $request->description;


        if ($request->hasFile('file')){

            $path = 'files/uploads/';
            $f = $request->file('file');
            $file_name = rand(0000,9999).'-'.$f->getFilename().'.'.$f->getClientOriginalExtension();
            $f->move($path,$file_name);

            if ($newFile->files != null && file_exists($newFile->files)){
                unlink($newFile->files);
            }

            $newFile->files =  $file_name;

        }
        $newFile->save();
        Alert::success('Success', 'File Send Successfully');
        return redirect()->route('file-management.index')->with($newFile->user_id);
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
        $file = FileManagement::findOrFail($id);
        $file_path = public_path("files/uploads/{$file->files}");

        if (FileManagement::exists($file_path)) {
            //File::delete($image_path);
            unlink($file_path);
        }
        else{
            dd('file not exists');
        }

        FileManagement::destroy($id);

        Alert::success('Success', 'File Deleted successfully');
        return redirect()->route('file-management.index');
    }
}
