@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')

<div class="container">

<h2>Registrar Producto</h2>

<form action="/product/store" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label for="nombre">Nombre del Producto</label>
<input type="text" id="nombre" name="nombre" placeholder="Ej: Laptop Gamer" required>
</div>

<div class="form-group">
<label for="precio">Precio</label>
<input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 2500" required>
</div>

<div class="form-group">
<label for="descripcion">Descripción</label>
<textarea id="descripcion" name="descripcion" placeholder="Describe el producto"></textarea>
</div>

<div class="form-group">
<label for="imagen">Imagen del Producto</label>
<input type="file" id="imagen" name="imagen" accept="image/*">
</div>

<div class="form-group">
<label for="categoria">Estado del Producto</label>
<select id="categoria" name="categoria" required>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
</div>

<button type="submit">Registrar Producto</button>

</form>

</div>