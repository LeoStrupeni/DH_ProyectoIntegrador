<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function show()
    {
        $faq = Faq::all();
        $topic = Faq::select('topic')->distinct()->get();

        return view('faq', compact('faq','topic'));
    }
}
