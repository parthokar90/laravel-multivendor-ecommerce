@extends('front.layout.master')

@section('title') Cart Item @endsection

@section('content')

<section class="cart-page py-5">
    <div class="container">

        <div class="row">

            {{-- LEFT: CART TABLE --}}
            <div class="col-lg-8">

                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0">Your Cart Items</h5>
                        </div>

                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table align-middle mb-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($cartItems as $key => $item)

                                        <tr>

                                            {{-- PRODUCT --}}
                                            <td>
                                                <div class="d-flex align-items-center gap-2">

                                                    <img width="60"
                                                        class="rounded"
                                                        src="{{ asset($item['image']) }}">

                                                    <div>
                                                        <strong>{{ $item['product_name'] }}</strong>

                                                        @if(!empty($item['attribute']))
                                                        <div class="text-muted small">
                                                            {{ $item['attribute'] }}
                                                        </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </td>

                                            {{-- PRICE --}}
                                            <td>
                                                ৳ {{ number_format($item['price']) }}
                                            </td>

                                            {{-- QTY --}}
                                            <td width="120">
                                                <input type="number"
                                                    name="quantity[{{ $key }}]"
                                                    value="{{ $item['quantity'] }}"
                                                    min="1"
                                                    class="form-control text-center">
                                            </td>

                                            {{-- TOTAL --}}
                                            <td>
                                                <strong>
                                                    ৳ {{ number_format($item['price'] * $item['quantity']) }}
                                                </strong>
                                            </td>

                                            {{-- DELETE --}}
                                            <td>
                                                <a href="{{ route('cart.destroy', $key) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Remove item?')">
                                                    ✕
                                                </a>
                                            </td>

                                        </tr>

                                        @empty

                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                Cart is empty
                                            </td>
                                        </tr>

                                        @endforelse

                                    </tbody>

                                </table>
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-dark">
                                Update Cart
                            </button>
                        </div>

                    </div>

                </form>

            </div>

            {{-- RIGHT: SUMMARY --}}
            <div class="col-lg-4">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-light">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <strong>৳ {{ number_format($subTotal) }}</strong>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>৳ {{ number_format($subTotal) }}</h5>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('checkout.page') }}"
                            class="btn btn-success w-100">
                            Proceed to Checkout
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection