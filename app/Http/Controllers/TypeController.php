<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index($id)
    {
        $type = Type::findOrFail($id);
        return view('types.show')
            ->with('type', $type);
    }
}
