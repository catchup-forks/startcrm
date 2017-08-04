<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all annoucements from the last 3 months
        $annoucements = \App\Annoucement::where('created_at', '>=', Carbon::now()->subMonths(3))->orderBy('created_at', 'DESC')->get();
        $profile = \App\Profile::where('user_id', Auth::user()->id)->with('rank')->firstOrFail();
        $curr_comms = Auth::user()->currcomms;
        $curr_projs = Auth::user()->currprojs;

        return view('portal.home')
            ->with('annoucements', $annoucements)
            ->with('profile', $profile)
            ->with('curr_comms', $curr_comms)
            ->with('curr_projs', $curr_projs);
    }

    public function support()
    {
        Auth::user()->courses()->sync(\App\Course::pluck('id')->toArray());
        return view('portal.support');
    }
}
