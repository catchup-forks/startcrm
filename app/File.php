<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function project() {
        return $this->belongsTo('App\Project');
    }
    
    public function category() {
        return $this->belongsTo('App\FileCategory');
    }
}
