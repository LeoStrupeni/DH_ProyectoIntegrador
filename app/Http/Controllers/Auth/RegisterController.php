<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use PragmaRX\Countries\Package\Countries;
use App\Role;

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
    protected $redirectTo = '/';

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
            'personal_id' => ['required', 'between:1,11'],
            'country' => ['required', 'string', 'max:255'],
            'profile' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'birthday' => ['required', 'date'],
            'avatar' => ['image']
        ], [
            'name.required' => 'Por favor, ingrese su nombre',
            'surname.required' => 'Por favor, ingrese su apellido',
            'personal_id' => 'Por favor, ingrese su documento',
            'personal_id.between' => 'Se deben ingresar entre 1 y 10 digitos',
            'country.required' => 'Por favor, seleccione su pais de residencia',
            'profile.required' => 'Por favor, elija la categoria correspondiente',
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

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],
            'profile_id' => $data['profile'],
            'personal_id' => $data['personal_id'],
            'birthday' => $data['birthday'],
            'country' => $data['country'],
            'avatar' => $fileName
        ]);

        //Creo una entrada en la tabla relacional rol_usuario
        $user->roles()->attach(Role::where('name', 'user')->first());

        return $user;
    }
}
