<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function rank() {
        return $this->belongsTo('App\Rank');
    }
    
    public function users() {
        return $this->belongsToMany('App\User')->withPivot('is_complete')->withTimestamps();
    }
    
    public function type() {
        return $this->belongsTo('App\CourseType');
    }
}
