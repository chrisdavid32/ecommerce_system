<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function viewCart()
    {
        return view('frontend.wishlist.view_cart');
    }

    public function getCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ]);
    }

    public function removeCartProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove from Cart']);
    }

    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    }
}
