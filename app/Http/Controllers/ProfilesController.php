<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return $profiles;
    }
}