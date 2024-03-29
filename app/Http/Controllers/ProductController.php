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
    public static function index()
    {
        $products = Product::UserActive()
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
        return view('products.create', compact('brands', 'category'));
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
            'name' => ['required', 'max:255'],
            'description' => 'required',
            'price' => ['required', 'numeric','digits_between:1,8'],
            'graduation' => ['required', 'numeric'],
            'origin' => 'required',
            'year' => ['required', 'integer'],
            'volume' => ['required', 'numeric'],
            'brand_id' => 'required',
            'category_id' => 'required',
            'stock' => ['required', 'integer'],
            'image' => ['image', 'nullable']
        ], [
            'required' => 'El campo :attribute es obligatorio',
            'image' => 'Solo se admiten imagenes en formatos apropiados',
            'numeric' => 'El campo :attribute debe ser numerico',
            'integer' => 'el campo :attribute debe ser un entero',
            'max' => 'El campo :attribute supera el maximo',
        ]);

        if ($request['image']) {

            $route = $request['image']->store('/public/images/Products');

            Product::create([
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
            Product::create([
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

        $notify = notify()->success('Producto agregado exitosamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect()->route('users.edit', Auth::user()->id)->with($notify);
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
        return view('products.edit', compact('product', 'brands', 'category'));
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
        ], [
            'required' => 'El campo :attribute es obligatorio',
            'image' => 'Solo se admiten imagenes en formatos apropiados',
            'numeric' => 'El campo :attribute debe ser numerico',
            'integer' => 'el campo :attribute debe ser un entero',
            'max' => 'El campo :attribute supera el maximo',
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

        $notify = notify()->success('Producto actualizado exitosamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect()->route('users.edit', Auth::user()->id)->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();
        $notify = notify()->warning('', 'Producto eliminado', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);
        return redirect()->back()->with($notify);
    }

    public function search(Request $request)
    {
        $filter_Brand = ($request->get('filter_marca') == 'Marcas') ? null : $request->get('filter_marca');
        $filter_Category = ($request->get('filter_categoria') == 'Categorias') ? null : $request->get('filter_categoria');
        $filter_Graduation = ($request->get('filter_graduacion') == 'Graduaciones') ? null : $request->get('filter_graduacion');
        $filter_Origin = ($request->get('filter_origin') == 'Origenes') ? null : $request->get('filter_origin');
        $filter_Volume = ($request->get('filter_volume') == 'Volumenes') ? null : $request->get('filter_volume');
        $filter_Year = ($request->get('filter_year') == 'Cosecha') ? null : $request->get('filter_year');
        $var = $request->input('PM');

        // dd($filter_Brand,$filter_Category,$filter_Graduation,$filter_Origin,$filter_Volume,$filter_Year,$var);

        $products = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image', 'Products.user_id', 'Products.Stock')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->paginate(28);

        $brands = Product::select('brands.id', 'brands.name')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('brands.name', 'asc')
            ->get();

        $categories = Product::select('categories.id', 'categories.name')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('categories.name', 'asc')
            ->get();

        $graduations = Product::select('products.graduation')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('products.graduation', 'asc')
            ->get();

        $origins = Product::select('products.origin')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('products.origin', 'asc')
            ->get();

        $years = Product::select('products.year')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('products.year', 'asc')
            ->get();

        $volumes = Product::select('products.volume')
            ->distinct()
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->UserDistinct()
            ->Stock()
            ->where(function ($query) use ($var) {
                $query->ProductsName($var)->CategoriesName($var)->BrandsName($var);
            })
            ->FilterBrands($filter_Brand)
            ->FilterCategory($filter_Category)
            ->FilterGraduation($filter_Graduation)
            ->FilterOrigin($filter_Origin)
            ->FilterVolume($filter_Volume)
            ->FilterYear($filter_Year)
            ->orderby('products.volume', 'asc')
            ->get();

        return view('search', compact('products', 'brands', 'categories', 'graduations', 'origins', 'years', 'volumes', 'var'));
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $product = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image', 'Products.graduation', 'Products.origin', 'Products.year', 'Products.volume', 'Products.Stock','Products.user_id', 'brands.name as brand', 'categories.name as categoria', 'categories.id as id_cat')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('brands', 'brand_id', '=', 'brands.id')
            ->where('products.id', '=', $id)
            ->get();

        $relatedWith = Product::select('Products.id', 'Products.name', 'Products.description', 'Products.price', 'Products.image', 'Products.graduation', 'Products.origin', 'Products.year', 'Products.volume', 'Products.Stock','Products.user_id')
            ->Where('Products.user_id', '=', $product->first()->user_id)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('detail', compact('product', 'relatedWith'));
    }

    public function apiSearch(Request $request)
    {
        $products = Product::select("name")
            ->where("name", "like", "%" . $request["PM"] . "%")
            ->union(Brand::select("name")->where("name", "like", "%" . $request["PM"] . "%"))
            ->union(Category::select("name")->where("name", "like", "%" . $request["PM"] . "%"))
            ->limit(20)
            ->get();
        return $products;
    }
}
