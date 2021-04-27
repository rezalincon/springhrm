<?php

namespace App\Http\Controllers\Employee;

use App\FileManagement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FileManagementController extends Controller
{



    public function show($id){

        /*if (auth()->user()->role == 'employee'){
            $data['users'] = User::with('fileManagements')->findOrFail($id);
            $data['files'] = FileManagement::where('user_id','=',$data['users']->id)->orderBy('id','DESC')->limit(4)->get();

        }*/

        $data = User::join('file_management','users.id','=','file_management.user_id')->where('file_management.user_id',$id)
        ->get();

       // echo count($data);

        return view('employee.file-management.index',compact('data'));
    }
}
