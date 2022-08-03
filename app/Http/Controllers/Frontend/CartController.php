<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

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

   public function removeMiniCart($rowId)
   {
    Cart::remove($rowId);
    return response()->json([
        'success' => 'Product remove from Cart'
    ]);
   }

   public function addToWishlist(Request $request, $product_id) 
   {
    if(Auth::check()){
        $exists = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();
        if(!$exists){
            Wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id
            ]);
            return response()->json(['success' => 'Product added to your wishlist successfully']);  
        }else{
            return response()->json(['error' => 'This Product already exist in your wishlist']);  
        }

    }else{
        return response()->json(['error' => 'You are not login']);
    }

   }

   public function applyCoupon(Request $request)
   {
    $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
    if ($coupon) {
        // Session::put('coupon', [
        //     'coupon_name' => $coupon->coupon_name,
        //     'coupon_discount' => $coupon->discount,
        //     'discount_amount' => Cart::total() * $coupon->coupon_discount,
        //     'total_amount'   => 

        // ]);
    }else{
        return response()->json(['error' => 'Invalid Counpon']);
    }
   }
}
