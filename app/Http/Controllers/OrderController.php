<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function makeOrder(Request $request){
        foreach (Cart::content() as $item) {
            Order::create([
                'user_phone' => $request->phone,
                'address'=> $request->address,
                'product_id' => $item->model->id,
                'product_name' => $item->model->name,
                'quantity' => $item->qty,
                'total_cost' => strval($request->total),
            ]);
        }
        return view('completedOrder');
        Cart::destroy();
    }

}
