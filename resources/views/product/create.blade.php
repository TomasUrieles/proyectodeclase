<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>

<div class="navbar">
    <h1>Tech Store</h1>
    <div>
        <a href="index.html">Inicio</a>
    </div>
</div>

<div class="container">
    <h2>Agregar Nuevo Producto</h2>

    <form>
        <input type="text" placeholder="ID del producto">
        <input type="text" placeholder="Nombre">
        <input type="number" placeholder="Precio">
        <textarea placeholder="Descripción"></textarea>
        
        <input type="file">

        <select>
            <option>Disponible</option>
            <option>No Disponible</option>
        </select>

        <button type="submit" class="btn">Guardar Producto</button>
    </form>
</div>

</body>
</html>
