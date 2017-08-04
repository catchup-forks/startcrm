<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    const NOVICE = 1;
    const APPRENTICE = 2;
    const PRACTITIONER = 3;
    const EXPERT = 4;

    public function profiles() {
        return $this->hasMany('App\Profile');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }

    public function users() {
        return $this->hasManyThrough('App\User', 'App\Profile');
    }
}
