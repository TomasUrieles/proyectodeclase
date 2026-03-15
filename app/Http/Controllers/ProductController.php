<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {

    $products = Product::limit(10)->orderBy('id','desc')->get();

    return view('product.index',[
        'products' => $products
    ]);

    }

    public function create()
    {
        $categoryList=Category::all();
        return view('product.create',[
            'categories'=>$categoryList
        ]);
    }
    
    public function edit($producto)
    {
        return view('product.edit');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('product.index');
    }
    


    public function store(Request $request){
        //Validación de datos
        $request->validate([
            'nombre'=>'required|string|min:5|max:255',
            'descripcion'=>'required|string',
            'precio'=>'required|numeric',
            'categoria'=>'required|exists:categories,id',
            'imagen'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

         //dd($request->all());

        $newProduct = new Product();
        $newProduct->name = $request->get('nombre');
        $newProduct->description = $request->get('descripcion');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('categoria');

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images', 'public');
            $newProduct->image_path = $ruta;
        }

        $newProduct->save();

        return redirect()->route('product.index');

        

    }

    public function show($producto)
    {
        return view('product.show');
    }
}

