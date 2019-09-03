<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::WHERE('user_id', '=', '1')
            ->orderBy('id', 'ASC')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $category = Category::all();
        return view('products.create', compact('brands','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'graduation' => 'required',
            'origin' => 'required',
            'image' => 'required',
            'year' => 'required',
            'volume' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'Stock' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $category = Category::all();
        return view('products.edit', compact('product','brands','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'graduation' => 'required',
            'origin' => 'required',
            'image' => 'required',
            'year' => 'required',
            'volume' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'Stock' => 'required'
        ]);

        Product::find($id)->update($request->all());
        return redirect()->route('products.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

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
