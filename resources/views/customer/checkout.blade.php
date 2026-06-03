@extends('front.layout.master')

@section('title') Checkout @endsection

@section('content')

<section class="checkout-page py-5">
    <div class="container">

        <div class="row">

            {{-- LEFT: BILLING FORM --}}
            <div class="col-lg-7">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white">
                        <h5 style="color: white;" class="mb-0">Billing Details</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('order.place') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" required></textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-dark w-100">
                                Place Order
                            </button>

                        </form>

                    </div>
                </div>

            </div>

            {{-- RIGHT: ORDER SUMMARY --}}
            <div class="col-lg-5">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-light">
                        <h5 class="mb-0">Your Order</h5>
                    </div>

                    <div class="card-body">

                        @if(!empty($cart) && count($cart) > 0)

                        @foreach($cart as $key => $item)

                        @php
                        $price = $item['price'] ?? 0;
                        $qty = $item['quantity'] ?? 1;
                        $name = $item['product_name'] ?? 'Unknown Product';
                        $image = $item['image'] ?? 'default.png';
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">

                            <div class="d-flex gap-2 align-items-center">

                                <img src="{{ asset($image) }}"
                                    width="50"
                                    height="50"
                                    class="rounded">

                                <div>
                                    <h6 class="mb-0">{{ $name }}</h6>
                                    <small class="text-muted">Qty: {{ $qty }}</small>
                                </div>

                            </div>

                            <div>
                                ৳ {{ number_format($price * $qty) }}
                            </div>

                        </div>

                        @endforeach

                        @else
                        <p class="text-muted">Cart is empty</p>
                        @endif

                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>৳ {{ number_format($subTotal ?? 0) }}</h5>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>
</section>

@endsection