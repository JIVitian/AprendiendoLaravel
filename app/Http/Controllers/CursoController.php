<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Manage several routes
class CursoController extends Controller
{
    // Control the principal page
    public function index() {
        return "Bienevenido a la pagina de cursos";
    }
    
    // Control the form page
    public function create() {
        return "En esta página podras crear un curso";
    }
    
    // Control a particular page
    public function show($curso) {
        return "Bienvenido al curso de $curso";
    }
}
