<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        // 1. Check if the cart is empty
        if (count($cart) == 0) {
            return view('front.error.cartEmpty');
        }

        // 2. Check if the user is not logged in
        if (!Auth::check()) {
            // Store the checkout URL in the session so we can redirect back here after login/registration
            session(['url.intended' => route('checkout.page')]);

            return redirect()->route('login')
                ->with('message', 'Please login or create an account to proceed with checkout.');
        }

        // 3. Calculate subtotal if authenticated and cart is not empty
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        }

        return view('customer.checkout', compact('cart', 'subTotal'));
    }
}
