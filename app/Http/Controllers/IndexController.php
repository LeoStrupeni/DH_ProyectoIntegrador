<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PragmaRX\Countries\Package\Countries;

class IndexController extends Controller
{
    public function dataIndex(){

        $countries = new Countries();

        $all = $countries->all()->pluck('name.common');

        $products=Product::leftJoin('categories', 'category_id', '=', 'categories.id')
                        ->leftJoin('brands', 'brand_id', '=', 'brands.id')
                        ->where('products.id', '<', '9')
                        ->get();
        
        return view('/index', compact(['products','all']));

    }

}