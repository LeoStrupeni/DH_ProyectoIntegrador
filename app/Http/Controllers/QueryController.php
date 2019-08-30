<?php

namespace App\Http\Controllers;

use App\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function add(Request $request)
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

        return redirect('/');
    }
}
