@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')

<div class="product-detail">

    <img src="{{ asset('storage/'.$product->imagen) }}" alt="Imagen">

    <h2>{{ $product->nombre }}</h2>

    <p class="price">
        ${{ number_format($product->precio, 0, ',', '.') }}
    </p>

    <p>{{ $product->descripcion }}</p>

    <p>
        <strong>Estado:</strong> 
        <span class="{{ $product->estado == 'Disponible' ? 'activo' : 'inactivo' }}">
            {{ $product->estado }}
        </span>
    </p>

    <br>

    <a href="{{ route('products.index') }}" class="btn">Volver</a>

</div>

@endsection
