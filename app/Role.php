<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    public $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
