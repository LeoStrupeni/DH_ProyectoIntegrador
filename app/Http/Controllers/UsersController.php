<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Product;
use Auth;
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('edit', 'update' , 'checkEmail');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $users = User::where('is_deleted', 0)->paginate(20);

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
    public function edit($id, Request $request)
    {
        $filter_Name = ($request->get('filter_nombre') == 'Productos') ? null :  $request->get('filter_nombre');
        $filter_Brand = ($request->get('filter_marca') == 'Marcas') ? null : $request->get('filter_marca');
        $filter_Category = ($request->get('filter_categoria') == 'Categorias') ? null : $request->get('filter_categoria');

        // dd($filter_Name,$filter_Brand,$filter_Category);

        $user = User::findOrFail($id);
        $profiles = Profile::all();
        $countries = Countries::all()->pluck('name.common');

        $products = Product::where('user_id', '=', Auth::user()->id)
                        ->FilterName($filter_Name)
                        ->FilterBrands($filter_Brand)
                        ->FilterCategory($filter_Category)
                        ->orderBy('name')
                        ->paginate(18);
        $nameProducts = Product::where('user_id', '=', Auth::user()->id)
                        ->FilterName($filter_Name)
                        ->FilterBrands($filter_Brand)
                        ->FilterCategory($filter_Category)
                        ->orderBy('name')
                        ->get();

        $brands = Product::select('brand_id')
                        ->distinct()
                        ->where('user_id', '=', Auth::user()->id)
                        ->FilterName($filter_Name)
                        ->FilterBrands($filter_Brand)
                        ->FilterCategory($filter_Category)
                        ->orderBy('brand_id')
                        ->get();
        $categories = Product::select('category_id')
                        ->distinct()
                        ->where('user_id', '=', Auth::user()->id)
                        ->FilterName($filter_Name)
                        ->FilterBrands($filter_Brand)
                        ->FilterCategory($filter_Category)
                        ->orderBy('category_id')
                        ->get();        

        return view('users.edit', compact('user', 'profiles', 'countries', 'products','brands','categories','nameProducts'));
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
            // 'password' => ['required', 'string', 'min:3'],
            'birthday' => ['required', 'date'],
            'avatar' => ['image', 'nullable']
        ], [
            'name.required' => 'Por favor, ingrese su nombre',
            'surname.required' => 'Por favor, ingrese su apellido',
            'personal_id' => 'Por favor, ingrese su documento',
            'country.required' => 'Por favor, seleccione su pais de residencia',
            'email.required' => 'Por favor, ingrese su correo electronico',
            'email.unique' => 'Este mail ya se encuentra en uso',
            // 'password.required' => 'Por favor, ingrese su password',
            'birthday.required' => 'Por favor, ingrese su fecha de nacimiento',
            'avatar.image' => 'Solo se admiten imagenes en formatos apropiados'
        ]);


        if ($request['avatar']) {

            $route = $request['avatar']->store('/public/avatars');

            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
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
                // 'password' => Hash::make($request->password),
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
        $user->is_deleted = 1;
        $user->save();

        return back();
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }
}
