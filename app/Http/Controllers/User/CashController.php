<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CashController extends Controller
{
    public function cashOrder(Request $request)
    {
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

       

        $order_id = Order::insertGetId([
            'user_id' => auth()->user()->id,
            'district_id' => $request->district_id,
            'division_id' => $request->division_id,
            'state_id' => $request->state_id,
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'Cash on Delivery',
            'payment_method' => 'Cash on Delivery',
            'currency' => 'naira',
            'amount' => $total_amount,
            'invoice_no' => 'CDS'. mt_rand(1000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            // 'comfirmed_date' => $request->notes,
            // 'processded_date' => $request->notes,
            // 'pick_date' => $request->notes,
            // 'shipped_date' => $request->notes,
            // 'cancel_date' => $request->notes,
            // 'returned_date' => $request->notes,
            // 'returned_reason' => $request->notes,
            'status' => 'Pending',
        ]);

        //sending user email after payment

        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'name' => $invoice->name,
            'email' => $invoice->email,
            'amount' => $total_amount,
        ];

        Mail::to($request->shipping_email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $cart) {
           OrderItem::create([
            'order_id' => $order_id,
            'product_id' => $cart->id,
            'color' => $cart->options->color,
            'size' => $cart->options->size,
            'qty' => $cart->qty,
            'price' => $cart->price
           ]);
        }

        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();

        $notification = [
            'message' => 'Order Place Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('dashboard')->with($notification);
    }
}
