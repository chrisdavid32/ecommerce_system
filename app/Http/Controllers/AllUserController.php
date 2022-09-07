<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function orderList()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_list', compact('orders'));
    }
}
