<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\customer\Order;
use App\Models\customer\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return back()->with('error', 'Cart is empty');
        }

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $validator = Validator::make($request->all(), [
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255|unique:users,email',
                'phone'   => 'required|string|max:20',
                'address' => 'required|string',
            ], [
                'email.unique' => 'This email is already registered. Please log in first to continue.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Start Database Transaction for Guest Checkout
            DB::beginTransaction();

            try {
                $user = User::create([
                    'first_name' => $request->name,
                    'last_name'  => '',
                    'email'      => $request->email,
                    'password'   => Hash::make('12345678'),
                    'mobile'     => $request->phone,
                    'status'     => 1,
                ]);

                Auth::login($user);
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Something went wrong while creating account. Please try again.')->withInput();
            }
        }

        if (!Auth::check()) {
            return back()->with('error', 'Authentication failed.');
        }

        // Using transaction safely for order and items creation
        if (!DB::transactionLevel()) {
            DB::beginTransaction();
        }

        try {
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

            // Commit all queries if everything runs smoothly
            DB::commit();

            session()->forget('cart');

            return redirect()->route('customer.dashboard')
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to place order. Please try again.')->withInput();
        }
    }
}
