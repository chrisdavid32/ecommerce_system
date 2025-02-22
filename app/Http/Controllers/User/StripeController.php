<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    public function stripeOrder(Request $request)
    {
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51Ld9VwKrWFLBrgUlcwDMGmmWXvJpjbZH5S5DPJf2HymaCMohiKrcAXDWtWGTSXwjIn8Ekpvv8xVGADI3MHtrZJhk00ZmeXlgz8');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount * 100,
        'currency' => 'usd',
        'description' => 'Chrisdave Store',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

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
            'payment_type' => 'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
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
