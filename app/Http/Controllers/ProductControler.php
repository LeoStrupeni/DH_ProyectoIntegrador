<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductControler extends Controller
{
    public function search(Request $request)
    {
        $par = $request->input('ParamBusqueda');
        $products = Product::leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->where('products.name', 'LIKE', '%' . $par . '%')
            ->orwhere('description', 'LIKE', '%' . $par . '%')
            ->orwhere('categories.name', 'LIKE', '%' . $par . '%')
            ->orwhere('brands.name', 'LIKE', '%' . $par . '%')
            ->paginate(50);

        return view('search', compact('products'));
    }
}
