<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Manage several routes
class CursoController extends Controller
{
    // Control the principal page
    public function index() {
        return view('cursos.index');
    }
    
    // Control the form page
    public function create() {
        return view('cursos.create');
    }
    
    // Control a particular page
    public function show($curso) {
        // return view('cursos.show', ['curso' => $curso]);
        // Or
        return view('cursos.show', compact('curso'));
    }
}
