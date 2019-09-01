<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Profile;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth()->user();
        $profiles = Profile::all();

        return view('user.profile', compact('user', 'profiles'));
    }

    public function update(Request $request, $id)
    {
        dd($request, $id);
    }
}
