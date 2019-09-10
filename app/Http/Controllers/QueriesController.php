<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use App\User;

class QueriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = Query::paginate(10);
        return view('queries.index', compact('queries'));
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
            'phone' => 'string|max:15|min:10',
            'message' => 'string|max:255|min:5|required'
        ];

        $messages = [
            'string' => 'El campo :attribute tiene que ser texto',
            'required' => 'El campo :attribute es requerido',
            'max' => 'El maximo del campo :attribute son :max caracteres',
            'min' => 'El minimo del campo :attribute son :min caracteres'
        ];

        $this->validate($request, $rules, $messages);

        $query = new Query();
        $query->name = $request['name'];
        $query->email = $request['email'];
        $query->phone = $request['phone'];
        $query->message = $request['message'];
        if (User::where('email', $query->email)->first()) {
            $query->is_registered = '1';
        } else {
            $query->is_registered = '0';
        }

        $query->save();

        notify()->success('Tus consulta fue enviada. En breve nos pondremos en contacto', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Query::find($id);

        return view('queries.show', compact('query'));
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
        Query::where('id', $id)->delete();

        return back();
    }
}
