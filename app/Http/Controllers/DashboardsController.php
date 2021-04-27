<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardsController extends Controller
{
    public function index()
    {
        $web = Course::where('name','Laravel')->get();
        $javascript = Course::where('name','JavaScript')->get();
        $python = Course::where('name','Python')->get();
        return view('index', compact('web', 'javascript', 'python'));
    }
}
