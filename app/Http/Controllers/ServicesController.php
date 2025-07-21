<?php

namespace App\Http\Controllers;

use App\Models\Services;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('services')
            ->with('services', $services);
    }
}
