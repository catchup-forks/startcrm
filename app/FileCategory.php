<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
    public function files() {
        return $this->hasMany('App\File');
    }
}
