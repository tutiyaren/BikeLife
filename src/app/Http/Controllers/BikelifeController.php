<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BikelifeController extends Controller
{
    public function top()
    {
        return view('top');
    }
    public function know()
    {
        return view('know');
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
}
