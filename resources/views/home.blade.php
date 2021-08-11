{{-- Inherits the layout --}}
@extends('layouts.plantilla')

{{-- Replace the @yield() with 'Home' --}}
@section('title', 'Home')

{{-- Replace the @yield() with this content ''--}}
@section('content')
    <h1>Bienvenido a la pagina principal</h1>
@endsection()