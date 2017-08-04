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
        return view('portal.admin.awards');
    }
    
    public function committees()
    {
        return view('portal.admin.committees');
    }
    
    public function courses()
    {
        return view('portal.admin.courses');
    }
    
    public function projects()
    {
        return view('portal.admin.projects');
    }
    
    public function users()
    {
        return view('portal.admin.users');
    }
    
}
