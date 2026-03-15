@extends('layouts.app')
@section('content')
<main class="container">
        <h1>Nuestros Productos</h1>

        <div class="product-grid">
            <!-- Producto 1 -->
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">📱</div>
                <span class="status-badge badge-new">Nuevo</span>
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="catalogImage"alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/default.png') }}" class="catalogImage"alt="Imagen por defecto">
                @endif
                <div class="product-info">
                    <h3>{{$product->name}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <p class="product-price">{{$product->price}}</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=1" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                    <button class="btn btn-outline">Editar</button>
                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline">Eliminar</button>
                    </form>
                </div>
            </div>

            @endforeach
        </div>
</main>
@endsection


