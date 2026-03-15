@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Panel de Administración</h1>

    <p>
        Bienvenido al panel administrativo de TechStore.
        Desde aquí puedes gestionar productos y categorías.
    </p>

    <div class="admin-links">

        <a href="/admin/categories" class="btn">
            Gestionar Categorías
        </a>

        <a href="{{ route('product.index') }}" class="btn">
            Ver Tienda
        </a>

    </div>

</div>

@endsection