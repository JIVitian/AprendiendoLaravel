@extends('layouts.plantilla')

@section('title','Cursos create')

@section('content')
    <h1>En esta pagina podras crear un curso</h1>

    {{-- Redirect to cursos by post, if you want to redirect to index the method may be get --}}
    <form action="{{ route('cursos.store') }}" method="post">
        {{-- Create a CSRF token in an hidden input --}}
        @csrf

        <input type="text" name="name" placeholder="Nombre"><br>
        <textarea name="description" rows="5" placeholder="Descripción"></textarea><br>
        <input type="text" name="category" placeholder="Categoria"><br>

        <button type="submit">Enviar</button>
    </form>
@endsection