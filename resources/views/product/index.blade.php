@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<h2>Productos Disponibles</h2>

<div class="grid">
    @foreach($products as $product)
        <div class="card">
            <img src="{{ asset('storage/'.$product->imagen) }}" alt="Imagen">

            <h3>{{ $product->nombre }}</h3>

            <p>{{ Str::limit($product->descripcion, 60) }}</p>

            <div class="price">
                ${{ number_format($product->precio, 0, ',', '.') }}
            </div>

            <p class="estado {{ $product->estado == 'Disponible' ? 'activo' : 'inactivo' }}">
                {{ $product->estado }}
            </p>

            <a href="{{ route('products.show', $product->id_product) }}" class="btn">
                Ver Detalle
            </a>
        </div>
    @endforeach
</div>

@endsection
