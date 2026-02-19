<nav class="navbar">

    <div class="logo">
        <a href="{{ route('product.index') }}">TechStore</a>
    </div>

    <div class="nav-links">
        <a href="{{ route('product.index') }}"
           class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
            Inicio
        </a>

        <a href="{{ route('product.create') }}"
           class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
            Agregar Producto
        </a>
    </div>

</nav>
