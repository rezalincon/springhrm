<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class AttendanceController extends Controller
{
    function index(){
        $attendance = Attendance::join('users','users.id','=','attendances.user_id')
        ->orderBy('attendances.id','asc')
        ->get();
        return view('admin.attendance.index',compact('attendance'));
    }

    function attendanceform(){
        return view('admin.attendance.attendanceform');
    }

    public function store(Request $req)
    {
        switch ($req->input('action')) {
            case 'timein':
               echo "working";

                $checkUser = User::where('id',$req->userid)->get();


               if (count($checkUser)>0) {
                $time = Carbon::today()->toDateString();
                $atten = Attendance::where('user_id',$req->userid)
                ->where('date',$time)
                ->get();
 
                $startTime = Carbon::now();
                $start = Carbon::parse($startTime)->format('H.i');
        
               
               if ($start>09.15) {
             $status = 'late in';
            } else {
             $status = 'okay';
            }
        
                if(count($atten)>0){
                    session()->flash('failed','This User already Time in Today');
                    return redirect()->route('admin.attendanceform');
                }
                else{
                $attendance=New Attendance;
                $attendance->date=$time;
                $attendance->timein=Carbon::now();
                $attendance->timeout='0';
                $attendance->workedhours='0';
                $attendance->timein_status=$status;
                $attendance->timein_ip=$req->ip();
                $attendance->user_id=$req->userid;
                $attendance->save();
                session()->flash('success','Successfully Timed In');
                return redirect()->route('admin.attendanceform');
            }
 
               } else {
                session()->flash('failed','User does not exsist');
                return redirect()->route('admin.attendanceform');
               }
               

              
                break;
    
            case 'timeout':
              
                
                $time = Carbon::today()->toDateString();
                $atten = Attendance::where('user_id',$req->userid)
                ->where('date',$time)
                ->get();
        
        
                
        
                if(count($atten)>0){
        
                    $att = Attendance::where('user_id',$req->userid)
                    ->where('date',$time)
                    ->where('workedhours','0')
                    ->get();
                    if (count($att)>0) {
        
                        
                $startTime = Carbon::parse($atten[0]->timein);
        
                $endTime = Carbon::now();
               
                $totalDuration =  $startTime->diff($endTime)->format('%H.%I');
                //dd($endTime);
               // echo $totalDuration;
               
               $end = Carbon::parse($endTime)->format('H.i');
               $start = Carbon::parse($endTime)->format('H.i');
        
               
               if ($end<17.45) {
             $status = 'early out';
            } else {
             $status = 'okay';
            }    
                    $attendance=Attendance::find($atten[0]->id);
                    $attendance->timeout=Carbon::now();
                    $attendance->workedhours=$totalDuration;
                    $attendance->timeout_status=$status;
                    $attendance->timeout_ip=$req->ip();
                    $attendance->save();
                    session()->flash('success','Successfully Time Out');
                    return redirect()->route('admin.attendanceform');
                    } else {
                    session()->flash('failed','User Already Timed Out');
                    return redirect()->route('admin.attendanceform');
                    }
                    
                }
                else{
        
                    session()->flash('failed','User not time in today');
                    return redirect()->route('admin.attendanceform');
               
            }
            

















                break;
    
           
        }
    }


    
}
