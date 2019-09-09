<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    public $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function scopeUserActive($query)
    {
        return $query->where('user_id', '=', Auth::user()->id);
    }

    public function scopeUserDistinct($query)
    {
        return $query->where('products.user_id','<>', Auth::user()->id);
    }
    
    public function scopeStock($query)
    {
        return $query->where('products.Stock','>',0);
    }

    


}
