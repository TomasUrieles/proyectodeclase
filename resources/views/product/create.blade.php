@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')

<h2>Agregar Producto</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="id_product" placeholder="ID del producto" required>

    <input type="text" name="nombre" placeholder="Nombre" required>

    <input type="number" name="precio" placeholder="Precio" required>

    <textarea name="descripcion" placeholder="Descripción"></textarea>

    <input type="file" name="imagen" required>

    <select name="estado">
        <option value="Disponible">Disponible</option>
        <option value="No Disponible">No Disponible</option>
    </select>

    <button type="submit" class="btn">Guardar Producto</button>
</form>

@endsection
