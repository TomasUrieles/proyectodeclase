@extends('layouts.app')

@section('content')

<div class="container">

    <div class="product-detail">

        <!-- Imagen -->

        @if ($product->image_path)

            <img 
                src="{{ asset('storage/'.$product->image_path) }}"
                class="catalogImage"
            >

        @else

            <img 
                src="{{ asset('images/default-product.png') }}"
                class="catalogImage"
            >

        @endif


        <!-- Información del producto -->

        <h1>ID del producto: {{ $product->id }}</h1>
        <h1>Nombre del producto: {{ $product->name }}</h1>
        <p>Descripción del producto: {{ $product->description }}</p>
        <h2>$ {{ $product->price }}</h2>


        <!-- Botón volver -->

        <a href="{{ route('product.index') }}" class="btn">
            Volver
        </a>

    </div>

</div>
<pre>

@endsection