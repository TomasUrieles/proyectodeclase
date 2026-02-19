@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')

<h1>Agregar Producto</h1>

<form>
    <input type="text" placeholder="Nombre">
    <input type="number" placeholder="Precio">
    <textarea placeholder="Descripción"></textarea>
    <button class="btn">Guardar</button>
</form>

@endsection
