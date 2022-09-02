<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        'metadata' => ['order_id' => '6735'],
        ]);

        // dd($charge);
    }
}
