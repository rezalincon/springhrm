<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use App\AssetType;
use App\Task;
use App\Expensive;
use App\Income;
use Image;
use File;

use App\Logo;

use App\Project;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskAssign;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    function index(){

        $totalemp = User::where('role','employee')->orwhere('role','admin')->get();
        $totalpro = Project::where('status','ongoing')->get();

        $activeuser = Attendance::join('users','users.id','=','attendances.user_id')
        ->where('attendances.timeout','0')->get();
        $asset = AssetType::get();

        $tpro= Project::get();
        $ttask= Task::get();


        $check = count($totalemp) - count($activeuser);

        $totalex = Expensive::sum('total_expense');
        $totalin = Income::sum('total_price');

        $totalprofit= $totalin - $totalex;

         $users = Income::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    	 			->get();

                  //  return $users;

        // $user = User::find([3]);

        // Notification::send($user, new TaskAssign($user));
        // return $user;





        return view('admin.dashboard',compact('activeuser','check','totalex','totalin','ttask','totalpro','tpro','totalemp','users','totalprofit','asset'));
    }

    public function logo(){


        return view('admin.logo.index');
    }

    public function logostore(Request $req){


    $logo = new Logo;

    $image=$req->file('image');
    $img='logo'.'.'.$image->getClientOriginalExtension();
    $location=public_path('images/logo/'.$img);
    Image::make($image)->save($location);
    $logo->logo=$img;
    $logo->save();

    session()->flash('success','Logo Updated');
    return redirect()->route('logo');
    }
}
