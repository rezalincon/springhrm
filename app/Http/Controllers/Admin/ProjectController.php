<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Workspace;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $emp = User::where('role','employee')->get();
        $workspace = Workspace::where('id',$id)->get();
        return view('admin.projects.index',compact('workspace','emp'));
    }

    public function projecttable($id){

        $project = Project::where('workspace_id',$id)->get();
        return response()->json(['data'=>$project]);

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
    public function projectview($wid,$id)
    {
        $workspace = Workspace::where('id',$wid)->get();
        $projects = Project::with('users')->where('id',$id)->get();
       $pro = Project::where('id',$id)->get();
        return view('admin.task.index',compact('workspace','projects','pro'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = 'ongoing';
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->budget = $request->budget;
        $project->workspace_id = $request->wid;
        $project->created_by =  Auth::user()->id;
        $project->assign_to = '---';

        $project->save();

        $pid = $project->id;

        $project->users()->attach($request->user_id);


        //return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project,$id)
    {
        $project = Project::find($id)->get();
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project =Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->budget = $request->budget;

        $project->save();
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function delete(Request $request,$id)
    {
        $project = Project::find($id);
        $project->users()->detach();

        $project->delete();

       // $task = Task::where('project_id')
        return response()->json($project);

    }
}
