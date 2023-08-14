<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index() 
    {
        return view ('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile.data-profile');
    }
}
