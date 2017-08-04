<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\EditProfile;

class UserController extends Controller
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

    public function profile() {
        $profile = Auth::user()->profile;
        $genders = \App\Gender::all();
        $ranks = \App\Rank::all();

        return view('portal.user.profile')
            ->with('profile', $profile)
            ->with('genders', $genders)
            ->with('ranks', $ranks);
    }

    public function settings() {
        return view('portal.user.settings');
    }

    public function changePassword(ChangePassword $request) {
        // update password
        Auth::user()->password = Hash::make($request->newpass);
        Auth::user()->save();

        \Session::flash('message', 'Password changed successfully!');
        \Session::flash('class', 'success');
        return redirect()->route('home');

    }

    public function editProfile(EditProfile $request) {

        $profile = Auth::user()->profile;

        // process image file
        if ($request->hasFile('image')) {
            $img_file = $request->file('image');
            // delete previous image file if is not default image
            if (!$profile->hasDefaultImage()) {
                Storage::delete('public/'.$profile->image_filepath);
            }
            // store file in storage folder, store($folder_name, $disk)
            $new_img_filepath = $img_file->store('profile_img', 'public');
            // update image filepath
            $profile->image_filepath = $new_img_filepath;
        }

        // update the rest of the profile
        $profile->fullname = $request->fullname;
        $profile->dob = Carbon::parse($request->dob);
        $profile->age = $request->age;
        $profile->gender_id = $request->gender;
        $profile->email = $request->email;
        $profile->mailaddr = $request->mailaddr;
        $profile->contacthp = $request->contacthp;
        $profile->contacthome = $request->contacthome;
        $profile->save();

        \Session::flash('message', 'Profile updated successfully!');
        \Session::flash('class', 'success');
        return redirect()->route('user.profile');

    }

}
