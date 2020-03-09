<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->products = Product::all();
    }
    public function showProducts(){
        return view('products', ['products' => $this->products]);
    }

    public function show(){

        $cart = Cart::content();
        $cartTotal = Cart::subtotal();
        if($cart->isEmpty()){
            return redirect('/');
        }
        return view('cart', ['cart' => $cart, 'cartTotal' => $cartTotal]);
    }

    public function addToCart(Request $request){

        $productId = $request->id;
        $product = Product::find($productId);

        $duplicates = Cart::search(function ($cart, $key) use($productId) {
            return $cart->id == $productId;
        });

       if($duplicates->isNotEmpty()){
        return response()->json(['Item is already in cart']);
       }

        Cart::add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');

        return response()->json(['Added to cart successfully']);
    }


}
