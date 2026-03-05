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

    public function store(Request $request){
        dd($request->all());

        $newProduct = new Product();
        $newProduct->name = $request->get('nombre');
        $newProduct->description = $request->get('descripcion');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('categoria');

        $newProduct->save();

        return redirect()->route('product.index');

    }

    public function show($producto)
    {
        return view('product.show');
    }
}

