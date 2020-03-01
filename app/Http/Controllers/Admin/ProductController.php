<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PHPUnit\Runner\Exception;

class ProductController extends Controller
{
    public function show(){
        return view('admin.product');
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|string|min:4',
                'price'=> 'required|numeric',
                'quantity'=>'required|integer',
            ]);

            Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
            ]);
            return redirect('/admin/products')->with('success','Created successfully');
        }else{
            throw new Exception('Error');
        }
    }
}
