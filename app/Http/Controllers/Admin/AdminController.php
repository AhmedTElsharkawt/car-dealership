<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;


class AdminController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.index' , compact('types'));
    }
}
