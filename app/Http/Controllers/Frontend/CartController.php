<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
   public function addToCart(Request $request, $id)
   {
    $product = Product::findOrFail($id);
    if($product->discount_price == NULL){
        Cart::add([
        'id' => $id, 
        'name' => $request->product_name, 
        'qty' => $request->quantity, 
        'price' => $product->selling_price, 
        'weight' => 1, 
        'options' =>
             [
                'image' => $product->product_thumbnail,
                'size' => $request->size,
                'color' => $request->color
            ]
    ]);
    return response()->json(['success' => 'Successfully Added to Cart']);
    }else{
        $discount = $product->selling_price - $product->discount_price;
        Cart::add([
            'id' => $id, 
            'name' => $request->product_name, 
            'qty' => $request->quantity, 
            'price' => $discount, 
            'weight' => 1, 
            'options' =>
                 [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color
                ]
        ]);
        return response()->json(['success' => 'Successfully Added to Cart']);
    }
   }

   public function addMiniCart()
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
}
