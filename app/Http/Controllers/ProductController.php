<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'LISTA DE PRODUCTOS';
    }

    public function create()
    {
        return "Formulario de crear producto";
    }

    public function show($producto)
    {
        return "Detalle del producto: " . $producto;
    }
}

