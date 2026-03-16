@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')

<div class="container">

    <h1 class="title">Carrito de Compras</h1>

    @if(session('cart') && count(session('cart')) > 0)

        <table class="cart-table">

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>

                @foreach(session('cart') as $id => $item)

                    <tr>

                        <td>
                            <div class="cart-product">

                                @if($item['image'])
                                    <img 
                                        src="{{ asset('storage/' . $item['image']) }}" 
                                        alt="{{ $item['name'] }}"
                                        class="cart-image"
                                    >
                                @else
                                    <img 
                                        src="{{ asset('images/default-product.png') }}" 
                                        alt="Imagen por defecto"
                                        class="cart-image"
                                    >
                                @endif

                                <span>{{ $item['name'] }}</span>

                            </div>
                        </td>

                        <td>
                            $ {{ $item['price'] }}
                        </td>

                        <td>
                            {{ $item['quantity'] }}
                        </td>

                        <td>

                            <form action="{{ route('cart.remove', $id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn">
                                    Eliminar
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p class="empty-cart">
            Tu carrito está vacío.
        </p>

    @endif
@php
$total = 0;
foreach($cart as $item){
    $total += $item['price'] * $item['quantity'];
}
@endphp

<h2>Total: $ {{ $total }}</h2>
</div>

@endsection