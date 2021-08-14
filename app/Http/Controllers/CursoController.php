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
        $cursos = Curso::orderBy('id','desc')->paginate();

        // Use the variable named cursos
        return view('cursos.index', compact('cursos'));
    }
    
    // Control the form page
    public function create() {
        return view('cursos.create');
    }

    // Control data storage
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|min:10',
            'category' => 'required'
        ]);

        $curso = new Curso();

        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->category = $request->category;

        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }
    
    // Control a particular page
    public function show(Curso $curso) {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso) {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->category = $request->category;

        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }
}
