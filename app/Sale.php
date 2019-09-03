<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $fillable = ['transaction_key','payment_data','transaction_date','total','status','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
