<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ------------------------
    //  RELATIONS
    // ------------------------

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function annoucements() {
        return $this->hasMany('App\Annoucement');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }

    public function projects() {
        return $this->belongsToMany('App\Project')->withPivot('can_edit', 'is_active')->withTimestamps();
    }

    public function currprojs() {
        return $this->belongsToMany('App\Project')->withPivot('can_edit', 'is_active')->withTimestamps()->wherePivot('is_active', true);
    }

    public function committees() {
        return $this->belongsToMany('App\Committee')->withPivot('is_active')->withTimestamps();
    }

    public function currcomms() {
        return $this->belongsToMany('App\Committee')->withPivot('is_active')->withTimestamps()->wherePivot('is_active', true);
    }

    public function awards() {
        return $this->belongsToMany('App\Award')->withTimestamps();
    }

    public function courses() {
        return $this->belongsToMany('App\Course')->withPivot('is_complete')->withTimestamps();
    }

    // ------------------------
    //  END RELATIONS
    // ------------------------

    const PASSWORD_REGEX = '(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$';
    const USERNAME_REGEX = '^[STFG]\d{7}[A-Z]$';

    public function isNew() {
        if ($this->profile->isDefault() || $this->hasDefaultPassword()) {
            return true;
        }
        return false;
    }

    public function hasDefaultPassword() {
        if (Hash::check($this->username, $this->password)) {
            return true;
        }
        return false;
    }

    // pre-cond: must check profile->isExpert beforehand, should not call if true
    public function hoursToRankUp() {
        $acc_hours = DB::table('events')->where('user_id', $this->id)->sum('duration');
        $acc_hours = $acc_hours/60;
        $req_hours = \App\Rank::where('title', $this->profile->rank->nextrank)->firstOrFail()->hours;
        return $req_hours - $acc_hours;
    }

}
