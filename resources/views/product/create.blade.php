@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')

<div class="container fade-in">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('product.index') }}" class="btn btn-ghost">
            ← Volver a productos
        </a>
    </div>

    <!-- Header -->
    <div class="form-header">
        <h1 class="title">Registrar Nuevo Producto</h1>
        <p class="subtitle">Completa la información del producto</p>
    </div>

    <!-- Alertas de error general -->
    @if($errors->any())
        <div class="alert alert-danger">
            <span>⚠️</span>
            <div>
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Formulario -->
    <div class="form-container">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">

            @csrf

            <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">
                    Nombre del producto <span>*</span>
                </label>
                <input 
                    type="text" 
                    id="nombre"
                    name="nombre" 
                    placeholder="Ej: Mouse Gamer RGB"
                    value="{{ old('nombre') }}"
                    required
                >
                @error('nombre')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Precio -->
            <div class="form-group">
                <label for="precio">
                    Precio <span>*</span>
                </label>
                <div class="input-icon">
                    <span class="input-prefix">$</span>
                    <input 
                        type="number" 
                        id="precio"
                        name="precio" 
                        placeholder="120000"
                        value="{{ old('precio') }}"
                        min="0"
                        step="0.01"
                        required
                    >
                </div>
                @error('precio')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="form-group">
                <label for="categoria">
                    Categoría <span>*</span>
                </label>
                <select id="categoria" name="categoria" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('categoria') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('categoria')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label for="descripcion">
                    Descripción
                </label>
                <textarea 
                    id="descripcion"
                    name="descripcion" 
                    rows="4" 
                    placeholder="Describe las características del producto..."
                >{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="form-group">
                <label for="imagen">
                    Imagen del producto
                </label>
                <div class="file-upload">
                    <input 
                        type="file" 
                        id="imagen"
                        name="imagen"
                        accept="image/*"
                        onchange="previewImage(event)"
                    >
                    <div class="file-upload-content">
                        <span class="file-upload-icon">📷</span>
                        <span class="file-upload-text">
                            Arrastra una imagen o haz clic para seleccionar
                        </span>
                        <span class="file-upload-hint">
                            PNG, JPG o WEBP (máx. 2MB)
                        </span>
                    </div>
                </div>
                
                <!-- Preview de imagen -->
                <div id="image-preview" class="image-preview" style="display: none;">
                    <img id="preview-img" src="" alt="Preview">
                    <button type="button" class="remove-image" onclick="removeImage()">✕</button>
                </div>
                
                @error('imagen')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="form-actions">
                <a href="{{ route('product.index') }}" class="btn btn-outline">
                    Cancelar
                </a>
                <button type="submit" class="btn">
                    💾 Guardar Producto
                </button>
            </div>

        </form>
    </div>

</div>

<!-- Script para preview de imagen -->
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        document.getElementById('imagen').value = '';
        document.getElementById('image-preview').style.display = 'none';
        document.getElementById('preview-img').src = '';
    }
</script>

@endsection


