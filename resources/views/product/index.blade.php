@extends('layouts.app')
@section('content')
<main class="container">
        <h1>Nuestros Productos</h1>

        <div class="product-grid">
            <!-- Producto 1 -->
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">📱</div>
                <span class="status-badge badge-new">Nuevo</span>
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="">
                @else
                    <img src="{{ asset('images/default-product.png') }}" alt="Imagen por defecto">
                @endif
                <div class="product-info">
                    <h3>{{$product->name}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <p class="product-price">{{$product->price}}</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=1" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            @endforeach
        </div>
</main>
@endsection

<script>
  // Tema

  const root = document.documentElement;
  const themeBtn = document.getElementById('themeBtn');

  const saved = localStorage.getItem('theme');
  if (saved) root.dataset.theme = saved;

  if (themeBtn) {
    themeBtn.textContent = root.dataset.theme === 'light' ? '🌙' : '☀️';
    themeBtn.onclick = () => {
      const n = root.dataset.theme === 'light' ? 'dark' : 'light';
      root.dataset.theme = n;
      localStorage.setItem('theme', n);
      themeBtn.textContent = n === 'light' ? '🌙' : '☀️';
    };
  }

  // Toast
  function toast(msg){
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.appendChild(t);
    requestAnimationFrame(() => t.classList.add('on'));
    setTimeout(() => t.classList.remove('on'), 2200);
    setTimeout(() => t.remove(), 2600);
  }
</script>

