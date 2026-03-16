<nav class="navbar">
    <div class="logo">
        <a href="{{ url('/') }}">TechStore</a>
    </div>

    <div class="nav-links">
        
        <!-- Enlaces principales -->
        <a href="{{ url('/') }}">
            🏠 Inicio
        </a>
        
        <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
            📦 Productos
        </a>
        
        <a href="{{ route('product.create') }}" class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
            ➕ Agregar Producto
        </a>
        
        <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.*') ? 'active' : '' }}">
            🛒 Carrito
        </a>

    </div>
</nav>