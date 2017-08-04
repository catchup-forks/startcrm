<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users() {
        return $this->belongsToMany('App\User')->withPivot('can_edit', 'is_active')->withTimestamps();
    }
    
    public function files() {
        return $this->hasMany('App\File');
    }
}
