<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserProject;
use Auth;

class ClientProjectController extends Controller
{
    public function index(){
       // $p = UserProject::get();
        $p = UserProject::join('users','users.id','=','user_projects.user_id')
        ->select('user_projects.id as cid','user_projects.*','users.*')
        ->get();
        return view('admin.client.projects',compact('p'));
    }

    public function addclientproject(){
        $user = User::where('role','client')->get();
        return view('admin.client.addproject',compact('user'));
    }

    public function store(Request $req){

        $p = new UserProject;
        $p->project_name = $req->name;
        $p->project_status = $req->status;
        $p->user_id= $req->client;
        $p->save();

        return redirect()->route('admin.clientproject');



    }


    public function destroy($id){

        $p = UserProject::find($id);

        $p->delete();

        return redirect()->route('admin.clientproject');



    }






    public function client(){

        $p = UserProject::where('user_id',Auth::user()->id)->get();



        return view('client.project.index',compact('p'));



    }
}
