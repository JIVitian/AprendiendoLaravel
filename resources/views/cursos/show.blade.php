@extends('layouts.plantilla')

@section('title','Curso de ' . $curso->name)

@section('content')
    <h1>Bienvenido al curso de {{ $curso->name }}</h1>
    <a href="{{ route('cursos.index') }}">Volver al listado</a>
    <a href="{{ route('cursos.edit', $curso) }}">Editar curso</a><br>
    <p><strong>Categoría:</strong> {{ $curso->category }}</p>
    <h3>Descripción</h3>
    <p>{{ $curso->description }}</p>

    <form action="{{ route('cursos.destroy', $curso) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
