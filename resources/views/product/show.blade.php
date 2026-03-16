@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="container fade-in">

    <!-- Breadcrumb -->
    <div style="margin-bottom: 30px;">
        <a href="{{ route('product.index') }}" class="btn btn-ghost">
            ← Volver al catálogo
        </a>
    </div>

    <div class="product-detail">

        <div class="product-detail-grid">

            <!-- Imagen -->
            <div class="product-detail-image">
                @if ($product->image_path)
                    <img 
                        src="{{ asset('storage/' . $product->image_path) }}"
                        alt="{{ $product->name }}"
                    >
                @else
                    <img 
                        src="{{ asset('images/default-product.png') }}"
                        alt="Imagen no disponible"
                    >
                @endif
            </div>

            <!-- Contenido -->
            <div class="product-detail-content">

                <!-- Badge de categoría -->
                @if($product->category)
                    <span class="badge badge-success" style="align-self: flex-start; margin-bottom: 15px;">
                        {{ $product->category->name }}
                    </span>
                @endif

                <h1>{{ $product->name }}</h1>

                <div class="product-price">
                    ${{ number_format($product->price, 2) }}
                </div>

                <p class="product-description">
                    {{ $product->description }}
                </p>

                <!-- Meta información -->
                <div class="product-detail-meta">
                    <div class="product-detail-meta-item">
                        <span>ID del producto</span>
                        <span>#{{ $product->id }}</span>
                    </div>
                    <div class="product-detail-meta-item">
                        <span>Disponibilidad</span>
                        <span style="color: var(--success);">✓ En stock</span>
                    </div>
                    <div class="product-detail-meta-item">
                        <span>Envío</span>
                        <span>Gratis a partir de \$50</span>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="product-actions" style="border-top: none; padding-top: 0;">
                    
                    <form action="{{ route('cart.add', $product) }}" method="POST" style="flex: 2;">
                        @csrf
                        <button type="submit" class="btn btn-lg" style="width: 100%;">
                            🛒 Agregar al carrito
                        </button>
                    </form>

                    <a href="{{ route('product.index') }}" class="btn btn-outline btn-lg">
                        Seguir comprando
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection