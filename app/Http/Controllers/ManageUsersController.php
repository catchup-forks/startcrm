<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUser;

class ManageUsersController extends Controller
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
        $users = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('ranks', 'ranks.id', '=', 'profiles.rank_id')
            ->select('users.username', 'users.is_admin', 'profiles.fullname', 'ranks.title as rank')
            ->get();

        return view('manage.users.index')
            ->with('users', $users);
    }

    public function adduser()
    {
        return view('manage.users.adduser');
    }

    public function create(CreateUser $request) {

        \DB::transaction(function () use ($request) {
            $user = new \App\User;
            $user->username = $request->username;
            $user->password = bcrypt($request->username);
            $user->is_admin = $request->is_admin;
            $user->save();

            $profile = new \App\Profile;
            $profile->user()->associate($user);
            if ($request->is_expert) {
                $rank = \App\Rank::findOrFail(\App\Rank::EXPERT);
            } else {
                $rank = \App\Rank::findOrFail(\App\Rank::NOVICE);
            }
            $profile->rank()->associate($rank);
            $profile->save();

            $user->courses()->sync(\App\Course::pluck('id')->toArray());
        });

        \Session::flash('message', 'New user created successfully!');
        \Session::flash('class', 'success');
        return redirect()->route('manage.users.adduser');
    }

}
