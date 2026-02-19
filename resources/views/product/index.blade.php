@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<h1>Lista de Productos</h1>

<a href="{{ route('product.create') }}" class="btn">
    Agregar Producto
</a>

<div class="grid">
    @foreach($products as $product)
        <div class="card">
            <h3>{{ $product->nombre }}</h3>
            <p>${{ $product->precio }}</p>

            <a href="{{ route('product.show', $product->id) }}" class="btn">
                Ver Producto
            </a>
        </div>
    @endforeach
</div>

@endsection
