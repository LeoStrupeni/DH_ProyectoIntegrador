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

    // Query scopes

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

    public function scopeProductsName($query, $var)
    {
        return $query->where('products.name', 'LIKE', '%' . $var . '%');
    }

    public function scopeCategoriesName($query, $var)
    {
        return $query->orwhere('categories.name', 'LIKE', '%' . $var . '%');
    }

    public function scopeBrandsName($query, $var)
    {
        return $query->orwhere('brands.name', 'LIKE', '%' . $var . '%');
    }

    // Query scopes Filters

    public function scopeFilterBrands($query, $filter_Brand)
    {   
        if (!is_null($filter_Brand)){
            return $query->where('brands.name', $filter_Brand);
        }
    }

    public function scopeFilterCategory($query, $filter_Category)
    {   
        if (!is_null($filter_Category)){
            return $query->where('categories.name', $filter_Category);
        }
    }
    
    public function scopeFilterGraduation($query, $filter_Graduation)
    {   
        if (!is_null($filter_Graduation)){
            return $query->where('Products.graduation', $filter_Graduation);
        }
    }

    public function scopeFilterOrigin($query, $filter_Origin)
    {   
        if (!is_null($filter_Origin)){
            return $query->where('Products.origin', $filter_Origin);
        }
    }    
    
    public function scopeFilterVolume($query, $filter_Volume)
    {   
        if (!is_null($filter_Volume)){
            return $query->where('Products.volume', $filter_Volume);
        }
    }   
    
    public function scopeFilterYear($query, $filter_Year)
    {   
        if (!is_null($filter_Year)){
            return $query->where('Products.volume', $filter_Year);
        }
    }  
    

}
