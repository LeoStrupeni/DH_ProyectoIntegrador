<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::WHERE('user_id', '=', Auth::user()->id)
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
            'name' => ['required', 'max:255'],
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'graduation' => ['required', 'numeric'],
            'origin' => 'required',
            'year' => ['required', 'integer'],
            'volume' => ['required', 'numeric'],
            'brand_id' => 'required',
            'category_id' => 'required',
            'stock' => ['required', 'integer'],
            'image' => ['image', 'nullable']
        ],[
            'required'=>'El campo :attribute es obligatorio',
            'image' => 'Solo se admiten imagenes en formatos apropiados',
            'numeric'=>'El campo :attribute debe ser numerico',
            'integer'=>'el campo :attribute debe ser un entero',
            'max'=>'El campo :attribute supera el maximo',
        ]);


        if ($request['image']) {
            
            $route = $request['image']->store('/public/images/Products');

            Product::find($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'graduation' => $request->graduation,
                'origin' => $request->origin,
                'year' => $request->year,
                'volume' => $request->volume,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'user_id' => $request->user_id,
                'image' => basename($route)          
            ]);
        } else {
            Product::find($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'graduation' => $request->graduation,
                'origin' => $request->origin,
                'year' => $request->year,
                'volume' => $request->volume,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'user_id' => $request->user_id
            ]);
        }
       
        $notify=notify()->success('Producto actualizado exitosamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect()->route('products.index')->with($notify);
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
        $par = $request->input('PM');
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
        $product = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image', 'Products.graduation', 'Products.origin', 'Products.year', 'Products.volume', 'Products.Stock', 'brands.name as brand', 'categories.name as categoria', 'categories.id as id_cat')
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

    public function apiSearch(Request $request) {
        $products = Product::select("name")
                            ->where("name", "like", "%" . $request["PM"] . "%")
                            ->union(Brand::select("name")->where("name", "like", "%" . $request["PM"] . "%"))
                            ->union(Category::select("name")->where("name", "like", "%" . $request["PM"] . "%"))
                            ->limit(20)
                            ->get();
        return $products;
        }

}
