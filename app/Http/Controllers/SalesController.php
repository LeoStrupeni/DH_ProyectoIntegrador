<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SalesDetail;
use App\Product;
use Auth;
use Session;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(10);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $idProductos = Session::get('cart');
        $total = 0;
        foreach ($idProductos as $value) {
            $total = $total + ($value['quantity'] * $value['price']);
        };

        $sale = new Sale();
        $sale->transaction_key = Session::getId();
        $sale->payment_data = 'MercadoPago';
        $sale->total = $total;
        $sale->status = 'Pendiente';
        $sale->user_id = Auth::user()->id;

        $sale->save();

        $idVenta = $sale->id;

        foreach ($idProductos as $value) {
            $saleDetail = new SalesDetail();
            $saleDetail->user_id = Auth::user()->id;
            $saleDetail->sale_id = $idVenta;
            $saleDetail->product_id = $value['id'];
            $saleDetail->unit_price = $value['price'];
            $saleDetail->quantity = $value['quantity'];
            $saleDetail->save();

            $restaStock = ($value['stock'] - $value['quantity']);
            $stock = Product::find($value['id'])->update(['stock' => $restaStock]);
        };

        Session::forget('cart');

        return view('shopcartPay', compact('total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);

        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);

        return view('sales.edit', compact('sale'));
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
        // $this->validate(
        //     $request,
        //     [''],
        //     ['']
        // );

        // Sale::find($id)->update($request->all());

        // notify()->success('Los datos de la venta han sido actualizados', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        // return back()->with('success', 'Venta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::where('id', $id)->delete();

        notify()->success('Los datos de la venta han sido eliminados', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return back();
    }
}
