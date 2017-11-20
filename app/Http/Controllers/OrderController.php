<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{

    protected $authUser;

    protected $request;


    public function index()
    {
        $orders = Order::with('products')->where('status','paid')->get();
        return view('orders.index', compact('orders'));

    }

    public function unprocessedOrders()
    {
        return Order::with('products')->where('status','paid')->count();
    }




}
