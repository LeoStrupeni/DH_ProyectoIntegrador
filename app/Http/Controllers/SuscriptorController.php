<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscriptor;

class SuscriptorController extends Controller
{
    public function add(Request $request)
    {
        $this->validate(
            $request,
            ['email' => 'email|required|max:255'],
            [
                'email' => 'El campo :attribute tiene que ser un correo',
                'required' => 'El campo :attribute es requerido',
                'max' => 'El maximo del campo :attribute son 255 caracteres'
            ]
        );

        $suscriptor = new Suscriptor();
        $suscriptor->email = $request['email'];

        if ($suscriptor->save()) {
            notify()->success('Fuiste suscripto correctamente', 'Felicitaciones', ["closeButton" => true]);
        } else {
            notify()->error('Ocurrio un error, intente nuevamente mas tarde', 'Error', ["closeButton" => true]);
        }

        return redirect('/');
    }
}
