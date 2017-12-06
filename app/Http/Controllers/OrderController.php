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
        $orders = Order::with('products')->whereIn('status',['paid','waiting'])->get();
        return view('orders.index', compact('orders'));

    }

    public function unprocessedOrders()
    {
        return Order::with('products')->whereIn('status',['paid','waiting'])->count();
    }

    public function processOrder($id)
    {
        $order = Order::where('id',$id)->first();
        $order->status = 'processed';
        $order->save();
        return back();
    }

    public function unprocessOrder($id)
    {
        $order = Order::where('id',$id)->first();
        $order->status = 'paid';
        $order->save();
        return back();
    }

    public function salesHistory()
    {
        $orders = Order::with('products')->where('status','processed')->get();
        return view('orders.history',compact('orders'));
    }

    public function sales()
    {
        $sales = Order::with('products')->where('status','processed')->sum('total');
        if($sales <= 0)
        {
            $sales = 0;
        }
        return $sales;
    }




}
