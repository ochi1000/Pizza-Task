<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Cart extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        $cart = session()->get('cart');
        // return response()->json($cart);

        //if cart is empty, it then adds first product
        if(empty($cart)){
            $cart = [
                $id=>[
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                ]
                ];

                session()->put('cart', $cart);
                return response()->json(session()->get('cart'));
        }

        //if cart not empty then check if product exists then increase quantity
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return response()->json(session()->get('cart'));
        }

            //if item does not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price
            ];
            session()->put('cart', $cart);
            return response()->json(session()->get('cart'));

    }

    public function show(){
        $cart = session()->get('cart');
        if(!empty($cart)){
            return view('cart');
            // return response()->json(session()->get('cart'));
        }
        else{
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            return redirect('/cart');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function order(Request $request){

       
    }
}


