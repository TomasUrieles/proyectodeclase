@extends('layouts.app')

@section('content')

<section class="landing">

    <div class="container landing-container">

        <!-- TEXTO PRINCIPAL -->
        <div class="landing-text">

            <h1>Bienvenido a TechStore</h1>

            <p>
                En TechStore encontrarás los mejores productos tecnológicos,
                accesorios y dispositivos al mejor precio del mercado.
                Explora nuestro catálogo y descubre las últimas novedades
                en tecnología.
            </p>

            <a href="{{ route('product.index') }}" class="btn">
                Explorar Productos
            </a>

        </div>

        <!-- IMAGEN PRINCIPAL -->
        <div class="landing-image">

            <img 
                src="{{ asset('images/techstore-banner.jpg') }}" 
                alt="Tecnología TechStore"
            >

        </div>

    </div>

</section>

@endsection