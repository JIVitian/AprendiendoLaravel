<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

// Manage several routes
class CursoController extends Controller
{
    // Control the principal page
    public function index() {
        
        // Take all cursos
        //$cursos = Curso::all();
        // Take 15 records
        $cursos = Curso::paginate();

        // Use the variable named cursos
        return view('cursos.index', compact('cursos'));
    }
    
    // Control the form page
    public function create() {
        return view('cursos.create');
    }
    
    // Control a particular page
    public function show($id) {
        // return view('cursos.show', ['curso' => $curso]);
        
        $curso = Curso::find($id);
        return view('cursos.show', compact('curso'));
    }
}
