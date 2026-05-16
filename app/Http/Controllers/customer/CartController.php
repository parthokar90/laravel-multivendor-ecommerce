<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\Product;

class CartController extends Controller
{
    /**
     * Cart Page
     */
    public function index()
    {
        $cartItems = session()->get('cart', []);

        if (count($cartItems) <= 0) {
            return view('front.error.cartEmpty');
        }

        $subTotal = 0;

        foreach ($cartItems as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }

        return view('customer.cart.cartItem', compact('cartItems', 'subTotal'));
    }

    /**
     * Add To Cart
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        $key = $product->id;

        if ($request->attribute) {
            $key = $product->id . '-' . $request->attribute;
        }

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
        } else {
            $cart[$key] = [
                'product_id'   => $product->id,
                'product_name' => $product->product_name,
                'price'        => $product->sale_price,
                'image'        => $product->image,
                'quantity'     => $request->quantity,
                'attribute'    => $request->attribute,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart');
    }

    /**
     * Update Cart
     */
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantity as $key => $qty) {
            if (isset($cart[$key])) {
                $cart[$key]['quantity'] = $qty;
            }
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Cart updated successfully');
    }

    /**
     * Delete Item
     */
    public function destroy($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed successfully');
    }

    /**
     * Clear Cart (optional)
     */
    public function clear()
    {
        session()->forget('cart');

        return back()->with('success', 'Cart cleared');
    }
}
