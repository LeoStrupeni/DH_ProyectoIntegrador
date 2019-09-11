<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscriptor;

class SuscriptorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('store', 'destroy', 'checkSuscriptorEmail');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscriptors = Suscriptor::paginate(10);
        return view('suscriptors.index', compact('suscriptors'));
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
        $this->validate(
            $request,
            ['email' => 'email|required|max:255|unique:suscriptors'],
            [
                'email' => 'El campo :attribute tiene que ser un correo',
                'required' => 'El campo :attribute es requerido',
                'max' => 'El maximo del campo :attribute son 255 caracteres',
                'unique' => 'Ya te encuentras suscripto'
            ]
        );

        $suscriptor = new Suscriptor();
        $suscriptor->email = $request['email'];

        if ($suscriptor->save()) {
            $notify = notify()->success('Fuiste suscripto correctamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);
        } else {
            $notify = notify()->error('Ocurrio un error, intente nuevamente mas tarde', 'Error', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);
        }

        return redirect('/')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscriptor = Suscriptor::find($id);

        return view('', compact('suscriptor'));
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
        Suscriptor::where('id', $id)->delete();

        return back();
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = Suscriptor::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }
}
