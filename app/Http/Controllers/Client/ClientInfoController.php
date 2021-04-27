<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ClientInfoController extends Controller
{
    public function show($id){


            $data['clients']= User::findOrFail($id);


        return view('register-client.client-info',$data);
    }
}
