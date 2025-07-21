<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index')->with('types', $types);
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:types|max:255',
        ]);

        Type::create($request->all());
        return redirect()->route('adminTypes');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $type = Type::findOrFail($id);
        $type->update($request->all());
        return redirect()->route('adminTypes');
    }

    public function destroy($id)
    {
        Type::destroy($id);
        return redirect()->route('adminTypes');
    }
}
