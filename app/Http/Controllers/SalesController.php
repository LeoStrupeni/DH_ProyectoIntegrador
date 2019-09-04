<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'key' => 'string|max:255',
            'payment_data' => 'string',
            'transaction_date' => 'date',
            'total' => 'decimal',
            'status' => 'string|max:255'
        ], [
            'string' => 'El atributo :attribute debe ser texto',
            'max' => 'El maximo de caracteres permitidos en el atributo :attribute son :max',
            'date' => 'El atributo :attribute debe ser de tipo fecha',
            'decimal' => 'El atributo :attribute debe ser de tipo decimal'
        ]);

        $sale = new Sale();
        $sale->transaction_key = $request['transaction_key'];
        $sale->payment_data = $request['payment_data'];
        $sale->transaction_date = $request['transaction_key'];
        $sale->total = $request['total'];
        $sale->status = $request['status'];
        $sale->user_id = $request['user_id'];

        $sale->save();

        notify()->success('Los datos de la venta han sido guardados', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return back();
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
        $this->validate(
            $request,
            [''],
            ['']
        );

        Sale::find($id)->update($request->all());

        notify()->success('Los datos de la venta han sido actualizados', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return back()->with('success', 'Venta actualizada correctamente');
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
