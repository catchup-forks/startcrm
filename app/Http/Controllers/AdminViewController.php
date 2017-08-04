<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function awards()
    {
        return view('manage.awards');
    }

    public function committees()
    {
        return view('manage.committees');
    }

    public function courses()
    {
        return view('manage.courses');
    }

    public function projects()
    {
        return view('manage.projects');
    }

    public function users()
    {
        return view('manage.users');
    }

}
