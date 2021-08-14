@extends('layouts.plantilla')

@section('title','Cursos')

@section('content')
    <h1>Bienvenido a la página de cursos</h1>
    <a href="{{ route('cursos.create') }}">Crear Cursos</a>
    <ul>
        @foreach ($cursos as $curso)
            <li>
                <a href="{{ route('cursos.show', $curso ) }}">Curso: {{ $curso->name }}</a>
            </li>
        @endforeach
    </ul>
        
    {{ $cursos->links() }} {{-- arrows to paginate --}}
@endsection