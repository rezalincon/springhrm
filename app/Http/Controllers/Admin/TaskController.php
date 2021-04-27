<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Task;
use App\Workspace;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskAssign;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
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

    public function inprogress()
    {
        $data = Task::where('status','inprogress')->get();
        return response()->json($data);
    }

    public function todo()
    {
        $data = Task::where('status','todo')->get();
        return response()->json($data);
    }

    public function finished()
    {
        $data = Task::where('status','finished')->get();
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = User::select('name')->find($request->user_id);
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->startdate = $request->startdate;
        $task->enddate = $request->enddate;
        $task->priority = $request->priority;
        $task->project_name = $request->project_name;
        $task->assign_to = $a;
        $task->workspace_id = $request->workspace_id;


        $task->save();
        $task->users()->attach($request->user_id);

        $user = User::find($request->user_id);

        Notification::send($user, new TaskAssign($user));
       // return $user;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->users()->detach();
        $task->delete();
        return response()->json($task);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task,$id)
    {
        $task = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.task_id',$id)->get();
        return response()->json($task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
         $task->status = $request->status;
        $task->startdate = $request->startdate;
        $task->enddate = $request->enddate;
        $task->priority = $request->priority;
        // $task->project_name = $request->project_name;
        // $task->assign_to = $a;
        // $task->workspace_id = $request->workspace_id;


        $task->save();
        //$task->users()->sync($request->user_id);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
