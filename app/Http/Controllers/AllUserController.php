<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function orderList()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_list', compact('orders'));
    }

    public function orderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', auth()->user()->id)->first();
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_detail', compact('order', 'order_item'));
    }

    public function invoice($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', auth()->user()->id)->first();
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.invoice', compact('order', 'order_item'));
    }
}
