@extends('layout.app')
@section('content')
<main class="container">
        <h1>Nuestros Productos</h1>

        <div class="product-grid">
            <!-- Producto 1 -->
            @foreach($misProductos as $product)
            <div class="product-card">
                <div class="product-image">📱</div>
                <div class="product-info">
                    <h3>{{$product->name}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <p class="product-price">{{$product->price}}</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=1" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            @endforeach
        </div>
</main>
@endsection