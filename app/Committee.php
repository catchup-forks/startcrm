<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public function users() {
        return $this->belongsToMany('App\User')->withPivot('is_active')->withTimestamps();
    }
}
