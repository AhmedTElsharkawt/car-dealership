<?php

namespace App\Http\Controllers;

use App\Models\Type;

class HomeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('home', compact('types'));
    }
}
