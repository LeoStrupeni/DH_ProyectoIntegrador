<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductControler extends Controller
{
    public function search(Request $request)
    {
        $par = $request->input('ParamBusqueda');
        $products = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->where('products.name', 'LIKE', '%' . $par . '%')
            ->orwhere('description', 'LIKE', '%' . $par . '%')
            ->orwhere('categories.name', 'LIKE', '%' . $par . '%')
            ->orwhere('brands.name', 'LIKE', '%' . $par . '%')
            ->paginate(28);

        return view('search', compact('products'));
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $product = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image', 'Products.graduation', 'Products.origin', 'Products.year', 'Products.volume', 'brands.name as brand', 'categories.name as categoria', 'categories.id as id_cat')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->where('products.id', '=', $id)
            ->get();

        $relatedWith = Product::Where('category_id', '=', $product->first()->id_cat)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('detail', compact('product', 'relatedWith'));
    }
}
