<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('product.cart', compact('cart'));
    }


    public function add(Product $product)
    {

        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])){

            $cart[$product->id]['quantity']++;

        } else {

            $cart[$product->id] = [

                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image_path ?? null,
                "quantity" => 1

            ];

        }

        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function remove($id)
    {

        $cart = session()->get('cart');

        if(isset($cart[$id])){

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return redirect()->back();
    }

}


