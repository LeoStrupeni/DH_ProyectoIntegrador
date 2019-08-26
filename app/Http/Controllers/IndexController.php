<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    public function productsIndex(){
        $products=Product::leftJoin('categories', 'category_id', '=', 'categories.id')
                        ->leftJoin('brands', 'brand_id', '=', 'brands.id')
                        ->where('products.id', '<', '9')
                        ->get();
        
        return view('/index', compact("products"));

    }

}
