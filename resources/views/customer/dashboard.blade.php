@extends('customer.layout.master')

@section('title') Dashboard @endsection

@section('content')

<!-- Bread crumb -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- CARDS -->
    <div class="row">

        <!-- Total Order -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="white-box text-center">
                <i class="fa fa-shopping-cart fa-2x text-primary"></i>
                <h3>Total Order</h3>
                <h2>{{ $totalOrder }}</h2>
            </div>
        </div>

        <!-- Pending -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="white-box text-center">
                <i class="fa fa-clock fa-2x text-warning"></i>
                <h3>Pending</h3>
                <h2>{{ $totalPending }}</h2>
            </div>
        </div>

        <!-- Completed -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="white-box text-center">
                <i class="fa fa-check-circle fa-2x text-success"></i>
                <h3>Completed</h3>
                <h2>{{ $totalCompleted }}</h2>
            </div>
        </div>

        <!-- Cancel -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="white-box text-center">
                <i class="fa fa-times-circle fa-2x text-danger"></i>
                <h3>Cancel</h3>
                <h2>{{ $totalCancel }}</h2>
            </div>
        </div>

    </div>

    <!-- RECENT ORDERS -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="white-box">

                <h3 class="box-title">Recent Orders</h3>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($recentOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->product_name ?? 'N/A' }}</td>
                            <td>${{ $order->total_amount ?? 0 }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status=='completed') bg-success
                                    @elseif($order->status=='pending') bg-warning
                                    @else bg-danger @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No Orders Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection