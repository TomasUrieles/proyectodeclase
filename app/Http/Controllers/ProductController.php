<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {

        $productList = Product::all();
        
        return view('product.index', [
            'misProductos' => $productList
        ]);
    }

    public function create()
    {
        $categoryList = Category::all();
        return view('product.create', [
            'categories' => $categoryList]);
    }

    public function show($producto)
    {
        return view('product.show');
    }
}

