<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationsController extends Controller
{
    public function register(){
        return view('registration.index');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            // 'last_name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'confirm_password' => 'required',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);

        // $user->confirm_password = $request->confirm_password;
        $user->status = 0;
        $user->save();


        return redirect()->route('registration.show');

    }


    public function show(){

        $users = User::get();
        return view('registration.show', compact('users'));
    }
}
