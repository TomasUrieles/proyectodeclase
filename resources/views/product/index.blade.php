@extends('layouts.app')

@section('title', 'Nuestros Productos')

@section('content')

<div class="container fade-in">

    <!-- Header de página -->
    <div class="page-header">
        <div>
            <h1 class="title">Nuestros Productos</h1>
            <p class="subtitle">Encuentra todo lo que necesitas en un solo lugar</p>
        </div>

        <!-- Filtros opcionales -->
        <div class="filters">
            <select class="filter-select" onchange="location = this.value;">
                <option value="">Todas las categorías</option>
                @foreach($categories ?? [] as $category)
                    <option value="?category={{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Contador de productos -->
    <div class="products-count">
        <p>Mostrando <strong>{{ $products->count() }}</strong> productos</p>
    </div>

    <!-- Grid de productos -->
    @if($products->isEmpty())

        <div class="empty-state">
            <div class="empty-state-icon">📦</div>
            <h3>No hay productos disponibles</h3>
            <p>Vuelve pronto, estamos agregando nuevos productos.</p>
            <a href="{{ route('home') }}" class="btn">
                Volver al inicio
            </a>
        </div>

    @else

        <div class="product-grid">

            @foreach($products as $product)

                <div class="product-card fade-in">

                    <!-- Imagen del producto -->
                    <div class="image-container">
                        
                        <!-- Badge de estado -->
                        @if($product->created_at->diffInDays(now()) < 7)
                            <span class="product-badge badge-new">Nuevo</span>
                        @endif

                        @if($product->discount ?? false)
                            <span class="product-badge badge-sale">-{{ $product->discount }}%</span>
                        @endif

                        @if ($product->image_path)
                            <img 
                                src="{{ asset('storage/' . $product->image_path) }}" 
                                class="catalogImage"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >
                        @else
                            <img 
                                src="{{ asset('images/default.png') }}" 
                                class="catalogImage"
                                alt="Imagen por defecto"
                            >
                        @endif

                        <!-- Overlay con acciones rápidas -->
                        <div class="image-overlay">
                            <a href="{{ route('product.show', $product->id) }}" class="quick-action" title="Ver detalles">
                                👁️
                            </a>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="quick-action-form">
                                @csrf
                                <button type="submit" class="quick-action" title="Agregar al carrito">
                                    🛒
                                </button>
                            </form>
                        </div>

                    </div>

                    <!-- Información del producto -->
                    <div class="product-info">

                        <!-- Categoría -->
                        @if($product->category)
                            <span class="product-category">{{ $product->category->name }}</span>
                        @endif

                        <h3 class="product-title">{{ $product->name }}</h3>

                        <p class="product-description">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <div class="product-footer">

                            <div class="price-container">
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                @if($product->old_price ?? false)
                                    <span class="product-old-price">${{ number_format($product->old_price, 2) }}</span>
                                @endif
                            </div>

                            <span class="product-status status-available">
                                ✓ Disponible
                            </span>

                        </div>

                    </div>

                    <!-- Acciones -->
                    <div class="product-actions">

                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline">
                            Ver más
                        </a>

                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">
                                🛒 Agregar
                            </button>
                        </form>

                    </div>

                    <!-- Acciones de Admin (solo si es admin) -->
                    @auth
                        @if(auth()->user()->is_admin ?? false)
                            <div class="admin-actions">
                                <a href="{{ route('product.edit', $product) }}" class="btn-admin">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('product.destroy', $product) }}" method="POST"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-danger">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection