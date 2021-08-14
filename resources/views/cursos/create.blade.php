@extends('layouts.plantilla')

@section('title','Cursos create')

@section('content')
    <h1>En esta pagina podras crear un curso</h1>

    {{-- Redirect to cursos by post, if you want to redirect to index the method may be get --}}
    <form action="{{ route('cursos.store') }}" method="post">
        {{-- Create a CSRF token in an hidden input --}}
        @csrf

        <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}"><br>

        @error('name')
            <small>*{{ $message }}</small>
            <br>
            <br>
        @enderror

        <textarea name="description" rows="5" placeholder="Descripción" value="{{ old('description') }}"></textarea><br>

        @error('description')
            <small>*{{ $message }}</small>
            <br>
            <br>
        @enderror

        <input type="text" name="category" placeholder="Categoria" value="{{ old('category') }}"><br>

        @error('category')
            <small>*{{ $message }}</small>
            <br>
            <br>
        @enderror

        <button type="submit">Enviar</button>
    </form>
@endsection