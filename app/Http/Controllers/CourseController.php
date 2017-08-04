<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function assigned()
    {
        $courses = Auth::user()->courses;
        $courses = $courses->where('rank_id', '<=' ,Auth::user()->profile->rank_id)->where('course_type_id', 1);
        dd($courses);
        return view('portal.course.assigned');
    }

    public function nonassigned()
    {
        return view('portal.course.non-assigned');
    }

}
