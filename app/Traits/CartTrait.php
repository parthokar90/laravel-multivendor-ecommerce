<?php

namespace App\Traits;

trait CartTrait
{
    /**
     * Cart Count
     */
    public function cartCount()
    {
        return count(session()->get('cart', []));
    }

    /**
     * Cart Items
     */
    public function cartItem()
    {
        return session()->get('cart', []);
    }

    /**
     * Cart Subtotal
     */
    public function cartSubTotal()
    {
        $subTotal = 0;

        foreach (session()->get('cart', []) as $item) {

            $subTotal += $item['price'] * $item['quantity'];
        }

        return $subTotal;
    }
}
