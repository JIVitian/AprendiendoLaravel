@extends('layouts.plantilla')

@section('title','Cursos edit')

@section('content')
    <h1>En esta pagina podras editar un curso</h1>

    {{-- Redirect to cursos by post, if you want to redirect to index the method may be get --}}
    <form action="{{ route('cursos.update', $curso) }}" method="post">
        {{-- Create a CSRF token in an hidden input --}}
        @csrf

        @method('put')

        <input type="text" name="name" placeholder="Nombre" value="{{ $curso->name }}"><br>
        <textarea name="description" rows="5" placeholder="Descripción">{{ $curso->description }}</textarea><br>
        <input type="text" name="category" placeholder="Categoria" value="{{ $curso->category }}"<br>

        <button type="submit">Actualizar</button>
    </form>
@endsection