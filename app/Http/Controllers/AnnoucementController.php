<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnnoucementRequest;

class AnnoucementController extends Controller
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

    public function index()
    {
        return view('manage.annoucement');
    }

    public function create(AnnoucementRequest $request) {

        $annoucement = new \App\Annoucement;
        $annoucement->user()->associate(Auth::user());
        $annoucement->title = $request->title;
        $annoucement->content = $request->content;
        $annoucement->save();

        \Session::flash('message', 'Annoucement created successfully!');
        \Session::flash('class', 'success');
        return redirect()->route('manage.annoucement');
    }

}
