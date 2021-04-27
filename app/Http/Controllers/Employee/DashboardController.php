<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $req){
        
        $a = $req->ip();

        $attendance = Attendance::where('user_id',Auth::user()->id)->get();
        return view('employee.dashboard',compact('attendance','a'));
        }
}
