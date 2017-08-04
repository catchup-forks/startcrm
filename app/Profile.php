<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['dob'];

    const DEFAULT_NAME = 'New User';
    const DEFAULT_IMAGE = 'default_profile_image.png';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function rank() {
        return $this->belongsTo('App\Rank');
    }

    public function gender() {
        return $this->belongsTo('App\Gender');
    }

    public function isDefault() {
        if ($this->fullname == self::DEFAULT_NAME) {
            return true;
        }
        return false;
    }

    public function isExpert() {
        if ($this->rank_id == \App\Rank::EXPERT) {
            return true;
        }
        return false;
    }

    public function hasDefaultImage() {
        if ($this->image_filepath == self::DEFAULT_IMAGE) {
            return true;
        }
        return false;
    }

    public function getImageAssetPath() {
        if ($this->hasDefaultImage()) {
            return 'img/'.$this->image_filepath;
        }
        return 'storage/'.$this->image_filepath;
    }

}
