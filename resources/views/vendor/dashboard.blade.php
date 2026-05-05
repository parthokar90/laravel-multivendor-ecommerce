@extends('vendor.layout.master')

@section('title') Dashboard @endsection

@section('content')

<div class="container-fluid">

    <!-- SUMMARY CARDS -->
    <div class="row">

        <div class="col-md-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center text-white">
                    <i class="mdi mdi-store fs-1"></i>
                    <h5 class="mt-2">My Shop</h5>
                    <h3>Tech World</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-hover">
                <div class="box bg-success text-center text-white">
                    <i class="mdi mdi-package-variant fs-1"></i>
                    <h5 class="mt-2">Total Products</h5>
                    <h3>128</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center text-white">
                    <i class="mdi mdi-cart fs-1"></i>
                    <h5 class="mt-2">Total Orders</h5>
                    <h3>54</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center text-white">
                    <i class="mdi mdi-cancel fs-1"></i>
                    <h5 class="mt-2">Cancelled Orders</h5>
                    <h3>6</h3>
                </div>
            </div>
        </div>

    </div>


    <!-- ORDER STATUS -->
    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Pending Orders</h5>
                    <h2 class="text-warning">12</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Processing</h5>
                    <h2 class="text-info">18</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Completed</h5>
                    <h2 class="text-success">36</h2>
                </div>
            </div>
        </div>

    </div>


    <!-- RECENT ORDERS -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Recent Orders</h4>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>#1001</td>
                                <td>John Doe</td>
                                <td>iPhone 15</td>
                                <td>$1200</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>

                            <tr>
                                <td>#1002</td>
                                <td>Sarah Khan</td>
                                <td>MacBook Pro</td>
                                <td>$2200</td>
                                <td><span class="badge bg-info">Processing</span></td>
                            </tr>

                            <tr>
                                <td>#1003</td>
                                <td>Alex Smith</td>
                                <td>AirPods</td>
                                <td>$250</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>

                            <tr>
                                <td>#1004</td>
                                <td>David Brown</td>
                                <td>Gaming Laptop</td>
                                <td>$1800</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection