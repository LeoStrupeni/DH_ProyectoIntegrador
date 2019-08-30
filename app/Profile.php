<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User', 'profile_id');
    }
}
