<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Session;

class ShopCartController extends Controller
{
public function __construct(){
    if (!Session::has('cart')) {Session::put('cart',array());}
}

    //Show cart
    public function show(){
        return view('/shopcart');
    }

    //Add item

    public function add(Request $request){
        $idProductos = Session::get('cart');

        if ( array_key_exists($request->id, $idProductos) ) {
            $notify=notify()->success('El producto ya esta agregado','Carrito', ["closeButton" => true, "positionClass" => "toast-top-left"]);
        } else {
            $cart = Session::get('cart');
            $cart[$request->id] =   ['id' => $request->id,
                                    'name' => $request->idname,
                                    'quantity' => $request->idquantity,
                                    'price' => $request->idprice];
            Session::put('cart',$cart);
            $notify=notify()->success('Producto agregado','Carrito', ["closeButton" => true, "positionClass" => "toast-top-left"]);
        }
        return redirect()->back()->with($notify);
    }

    //Delete Item
    public function delete(Request $request){
        $cart = Session::get('cart');
        unset($cart[$request->id]);
        Session::put('cart',$cart);
        $notify=notify()->warning('Producto Eliminado','Carrito', ["closeButton" => true, "positionClass" => "toast-top-left"]);
        return redirect()->back()->with($notify);
    }

    //Update Item

    //Trash cart

    public function trash(){
        Session::forget('cart');
        $notify=notify()->warning('Vaciado','Carrito', ["closeButton" => true, "positionClass" => "toast-top-left"]);
        return redirect()->back()->with($notify); 
    }
    //Total

}
