<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $profiles = Profile::all();
        $countries = Countries::all()->pluck('name.common');

        return view('users.edit', compact('user', 'profiles', 'countries'));
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'personal_id' => ['required', 'integer'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:3'],
            'birthday' => ['required', 'date'],
            'avatar' => ['image', 'nullable']
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


        if ($request['avatar']) {
            
            $route = $request['avatar']->store('/public/avatars');

            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'personal_id' => $request->personal_id,
                'birthday' => $request->birthday,
                'profile_id' => $request->profile_id,
                'country' => $request->country,
                'avatar' => basename($route)
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'personal_id' => $request->personal_id,
                'birthday' => $request->birthday,
                'profile_id' => $request->profile_id,
                'country' => $request->country
            ]);
        }

        notify()->success('Tus datos fueron actualizados exitosamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        notify()->success('El usuario fue eliminado correctamente', 'Felicitaciones', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);

        return back();
    }
}
