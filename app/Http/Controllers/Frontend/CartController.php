<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
   public function addToCart(Request $request, $id)
   {
    if(Session::has('coupon')){
        Session::forget('coupon');
    }
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
        Session::put('coupon', [
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->discount,
            'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
            'total_amount'   =>  round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
        ]);
        return response()->json(['success' => 'Coupon applied Successfully', 'validity' => true]);
    }else{
        return response()->json(['error' => 'Invalid Counpon']);
    }
   }

   public function couponCalculation()
   {
    if(Session::has('coupon')){
        return response()->json([
            'subtotal' => Cart::total(),
            'coupon_name' => session()->get('coupon')['coupon_name'],
            'coupon_discount' => session()->get('coupon')['coupon_discount'],
            'discount_amount' => session()->get('coupon')['discount_amount'],
            'total_amount' => session()->get('coupon')['total_amount']
        ]);
    }else{
        return response()->json([
            'total' => Cart::total()
        ]);

    }
   }

   public function couponRemove()
   {
    Session::forget('coupon');
    return response()->json(['success' => 'Coupon removed sucessfully']);
   }

   public function checkoutCreate()
   {
    if(Auth::check()){
        if(Cart::total() > 0){
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
            return view('frontend.checkout.checkout-view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
        }else{
            $notification = [
                'message' => 'Item cart is empty',
                'alert-type' => 'error'
            ];
            return redirect()->to('/')->with($notification);
        }

    }else{
        $notification = [
            'message' => 'You have to Login first to proceed',
            'alert-type' => 'error'
        ];
        return redirect()->route('login')->with($notification);
    }
   }

   public function getDistrict($division_id)
   {
    $data = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
    return response()->json($data);
   }

   public function getState($district_id)
   {
    $data = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
    return response()->json($data);
   }

   public function checkoutStore(Request $request)
   {
  
    $data = [
        'shipping_name' => $request->shipping_name,
        'shipping_email' => $request->shipping_email,
        'shipping_phone' => $request->shipping_phone,
        'post_code' => $request->post_code,
        'district_id' => $request->district_id,
        'division_id' => $request->division_id,
        'state_id' => $request->state_id,
        'notes' => $request->notes,
    ];
    $cartTotal = Cart::total();
    
    if($request->payment_method == 'stripe'){
        return view('frontend.payment.stripe', compact('data', 'cartTotal'));
    }elseif($request->payment_method == 'card'){
        return 'card';
    }else{
        return 'cash'; 
    }
   }
}
