<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use PHPUnit\Runner\Exception;

class DashboardController extends Controller
{
    public function __construct()
    {

        $this->products = Product::all();
        $this->orders = Order::all();
        // $this->middleware('auth');
    }

    public function show(){
        return view('admin.dashboard', ['products' => $this->products]);
    }

}
