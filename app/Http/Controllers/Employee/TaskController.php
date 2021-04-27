<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){
        $a = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','inprogress')->get();
        $user=User::find(Auth::user()->id);

        $b = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','todo')->get();

        $c = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','finished')->get();
        //$user=User::find(Auth::user()->id);
        //echo $a;


      

        return view('employee.task.index',compact('c','a','b'));
    }
}
