@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content')
    <h1>Dejanos un mensaje</h1>

    <form action="{{ route('contactanos.store') }}" method="post">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
            <br>
        </label>

        @error('name')
            <small><strong>{{ $message }}</strong></small>
            <br>
            <br>
        @enderror

        <label>
            Correo:
            <br>
            <input type="mail" name="mail">
            <br>
        </label>

        @error('mail')
            <small><strong>{{ $message }}</strong></small>
            <br>
            <br>
        @enderror

        <label>
            Mensaje:
            <br>
            <textarea name="message" rows="4"></textarea>
            <br>
        </label>

        @error('message')
            <small><strong>{{ $message }}</strong></small>
            <br>
            <br>
        @enderror

        <button type="submit">Enviar mensaje</button>
    </form>
    
    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>
    @endif
@endsection()