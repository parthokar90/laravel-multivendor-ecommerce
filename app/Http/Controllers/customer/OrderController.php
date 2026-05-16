<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\customer\Order;
use App\Models\customer\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return back()->with('error', 'Cart is empty');
        }

        /**
         * 1. CREATE USER (or get existing)
         */
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'first_name' => $request->name,
                'last_name'  => '',
                'email'      => $request->email,
                'password'   => Hash::make('12345678'),
                'mobile'     => $request->phone,
                'status'     => 1,
            ]);
        }

        /**
         * 2. LOGIN USER AUTOMATICALLY
         */
        Auth::login($user);

        /**
         * 3. CREATE ORDER
         */
        $order = Order::create([
            'user_id'       => $user->id,
            'charge_id'     => 0,
            'coupon_id'     => 0,
            'ship_address'  => $request->address,
            'ship_location' => '',
            'bill_address'  => $request->address,
            'bill_location' => '',
            'status'        => 'pending',
            'order_date'    => date('Y-m-d'),
        ]);

        /**
         * 4. INSERT ORDER ITEMS
         */
        foreach ($cart as $item) {

            OrderItem::create([
                'order_id'     => $order->id,
                'user_id'      => $user->id,
                'product_id'   => $item['product_id'],
                'vendor_id'    => 0,
                'attribute_id' => $item['attribute'] ?? 0,
                'quantity'     => $item['quantity'],
                'status_id'    => 1,
            ]);
        }

        /**
         * 5. CLEAR CART
         */
        session()->forget('cart');

        /**
         * 6. REDIRECT DASHBOARD
         */
        return redirect()->route('customer.dashboard')
            ->with('success', 'Order placed successfully!');
    }
}
