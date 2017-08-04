<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annoucement extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function createdby() {
        return $this->user->profile->fullname;
    }
}
