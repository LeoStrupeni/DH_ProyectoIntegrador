<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use PragmaRX\Countries\Package\Countries;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'personal_id' => ['required', 'integer'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'birthday' => ['required', 'date'],
            'avatar' => ['image']
        ], [
            'name.required' => 'Por favor, ingrese su nombre',
            'surname.required' => 'Por favor, ingrese su apellido',
            'personal_id' => 'Por favor, ingrese su documento',
            'country.required' => 'Por favor, seleccione su pais de residencia',
            'email.required' => 'Por favor, ingrese su correo electronico',
            'email.unique' => 'Este mail ya se encuentra en uso',
            'password.required' => 'Por favor, ingrese su password',
            'birthday.required' => 'Por favor, ingrese su fecha de nacimiento',
            'avatar.image' => 'Solo se admiten imagenes en formatos apropiados'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $route = $data['avatar']->store('/public/avatars');
        $fileName = basename($route);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],
            'personal_id' => $data['personal_id'],
            'birthday' => $data['birthday'],
            'country' => $data['country'],
            'avatar' => $fileName
        ]);
    }
}
