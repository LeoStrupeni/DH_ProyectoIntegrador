<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;

class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'integer',
            'message' => 'string|max:255'
        ];

        $messages = [
            'string' => 'El campo :attribute tiene que ser texto',
            'required' => 'El campo :attribute es requerido',
            'integer' => 'El campo :atribute tiene que ser numerico',
            'max' => 'El maximo del campo :attribute son 255 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        $query = new Query();
        $query->name = $request['name'];
        $query->email = $request['email'];
        $query->phone = $request['phone'];
        $query->message = $request['message'];
        $query->is_registered = '0';

        $query->save();

        notify()->success('Tus consulta fue enviada. En breve nos contactaremos', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
