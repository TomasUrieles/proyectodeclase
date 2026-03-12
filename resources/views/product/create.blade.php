@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <h2 class="title">Registrar Nuevo Producto</h2>
    <form class="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nombre del producto</label>
            <input type="text" name="nombre" placeholder="Ej: Mouse Gamer RGB" required>
            @error ('nombre')
                <span style="color: red; font-size: 14px;"
                 class="error">{{ $message }}
                </span>
            @enderror

        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" name="precio" placeholder="Ej: 120000" required>
                        @error ('precio')
                <span style="color: red; font-size: 14px;"
                 class="error">{{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" rows="4" placeholder="Descripción del producto..."></textarea>
                        @error ('descripcion')
                <span style="color: red; font-size: 14px;"
                 class="error">{{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Imagen del producto</label>
            <input type="file" name="imagen">
            @error ('imagen')
                <span style="color: red; font-size: 14px;"
                 class="error">{{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Estado del producto</label>
                <select id="categoria" name="categoria" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
        </div>

        <button type="submit" class="btn">
            Guardar Producto
        </button>

    </form>

</div>


</body>
</html>