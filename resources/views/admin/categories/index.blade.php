@extends('layouts.app')

@section('title','Categorías')

@section('content')

<div class="container">

    <h1 class="title">Categorías</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn">
        Crear categoría
    </a>

    <br><br>

    @if($categories->isEmpty())

        <p>No hay categorías registradas.</p>

    @else

        <div class="grid">

            @foreach($categories as $category)

                <div class="card">

                    <h3>{{ $category->name }}</h3>

                    <div class="product-actions">

                        <a href="{{ route('admin.categories.edit',$category) }}" class="btn">
                            Editar
                        </a>

                        <form action="{{ route('admin.categories.destroy',$category) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn">
                                Eliminar
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection