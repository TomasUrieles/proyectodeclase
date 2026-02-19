@extends('layouts.app')

@section('title', 'Detalle')

@section('content')

<h1>{{ $product->nombre }}</h1>

<p>${{ $product->precio }}</p>
<p>{{ $product->descripcion }}</p>

<a href="{{ route('product.index') }}" class="btn">
    Volver
</a>

@endsection
