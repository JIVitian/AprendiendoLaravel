<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCursoRequest;

// Manage several routes
class CursoController extends Controller
{
    // Control the principal page
    public function index()
    {

        // Take all curses
        //$cursos = Curso::all();
        // Take 15 records
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        // Use the variable named cursos
        return view('cursos.index', compact('cursos'));
    }

    // Control the form page
    public function create()
    {
        return view('cursos.create');
    }

    // Control data storage
    public function store(StoreCursoRequest $request)
    {
        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso);
    }

    // Control a particular page
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    // Edit a curse
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    // Update a curse
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.show', $curso);
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
