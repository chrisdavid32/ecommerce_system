<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripeOrder(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51Ld9VwKrWFLBrgUlcwDMGmmWXvJpjbZH5S5DPJf2HymaCMohiKrcAXDWtWGTSXwjIn8Ekpvv8xVGADI3MHtrZJhk00ZmeXlgz8');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => 999 * 100,
        'currency' => 'usd',
        'description' => 'Chrisdave Store',
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
        ]);

        // dd($charge);
    }
}
