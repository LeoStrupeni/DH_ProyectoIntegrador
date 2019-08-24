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
        $products = Product::leftJoin('prod_categorias', 'Categoria', '=', 'prod_categorias.ID')
            ->leftJoin('prod_marcas', 'Marcas_idMarcas', '=', 'prod_marcas.ID')
            ->where('name', 'LIKE', '%' . $par . '%')
            ->orwhere('Descripcion', 'LIKE', '%' . $par . '%')
            ->orwhere('prod_categorias.Nombre', 'LIKE', '%' . $par . '%')
            ->orwhere('prod_marcas.Nombre', 'LIKE', '%' . $par . '%')
            ->paginate(50);

        $vac = compact("products");
        return view('/Search', $vac);
    }
}
