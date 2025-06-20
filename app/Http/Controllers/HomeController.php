<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // <-- ISSO AQUI!!!

class HomeController extends Controller
{
    public function index()
    {
        $cursosDestaque = Curso::where('slug', 'destacar')->latest()->get();
        return view('welcome', compact('cursosDestaque'));
    }
}

