<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function logout()
    {
        \Session::flash('message', 'You have logged out successfully');
        Auth::logout();
        return redirect()->route('login');
    }

}