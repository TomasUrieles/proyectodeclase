@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<div class="container fade-in">

    <!-- Header de página -->
    <div class="page-header">
        <div>
            <h1 class="title">Categorías</h1>
            <p class="subtitle">Gestiona las categorías de tu tienda</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn">
            <span>➕</span> Crear categoría
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Contenido -->
    @if($categories->isEmpty())

        <div class="empty-state">
            <div class="empty-state-icon">📁</div>
            <h3>No hay categorías</h3>
            <p>Comienza creando tu primera categoría para organizar tus productos.</p>
            <a href="{{ route('admin.categories.create') }}" class="btn">
                Crear primera categoría
            </a>
        </div>

    @else

        <div class="grid">

            @foreach($categories as $category)

                <div class="card fade-in">

                    <h3>{{ $category->name }}</h3>
                    
                    @if($category->description)
                        <p>{{ $category->description }}</p>
                    @endif

                    <span class="badge badge-success">
                        {{ $category->products_count ?? 0 }} productos
                    </span>

                    <div class="product-actions">

                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline btn-sm">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑️ Eliminar
                            </button>
                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection