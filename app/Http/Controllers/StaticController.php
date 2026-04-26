<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function developers()
    {
        if (auth()->check()) {
            return redirect()->route('developers.keys.index');
        }
        return view('developers');
    }

    public function faq()
    {
        return view('faq.index');
    }

    public function privacy()
    {
        return view('faq.privacy');
    }

    public function guidelines()
    {
        return view('faq.guidelines');
    }
}
