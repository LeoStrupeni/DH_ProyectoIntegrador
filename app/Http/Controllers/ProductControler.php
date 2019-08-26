<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductControler extends Controller
{
    //Hay que migrar esto al ProductsController y cambiar los parametros por los de la nueva DB
    public function search()
    {
        $par = $_POST['ParamBusqueda'];
        $products = Product::leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->where('products.name', 'LIKE', '%' . $par . '%')
            ->orwhere('description', 'LIKE', '%' . $par . '%')
            ->orwhere('categories.name', 'LIKE', '%' . $par . '%')
            ->orwhere('brands.name', 'LIKE', '%' . $par . '%')
            ->paginate(50);

        $vac = compact("products");
        return view('/Search', $vac);
    }
}
