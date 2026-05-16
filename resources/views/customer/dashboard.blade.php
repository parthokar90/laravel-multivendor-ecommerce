@extends('customer.layout.master')

@section('title') Dashboard @endsection

@section('content')

<div class="container-fluid py-4">

    <!-- STATS CARDS -->
    <div class="row g-3">

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6>Total Orders</h6>
                <h2 class="text-primary">{{ $totalOrder }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6>Pending</h6>
                <h2 class="text-warning">{{ $totalPending }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6>Completed</h6>
                <h2 class="text-success">{{ $totalCompleted }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6>Cancelled</h6>
                <h2 class="text-danger">{{ $totalCancel }}</h2>
            </div>
        </div>

    </div>

    <!-- RECENT ORDERS -->
    <div class="card shadow-sm border-0 mt-4">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Recent Orders</h5>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentOrders as $order)

                    <tr>

                        <td>
                            <strong>#{{ $order->id }}</strong>
                        </td>

                        <td>
                            @foreach($order->items as $item)
                                <div class="d-flex align-items-center gap-2 mb-2">

                                    <img width="40"
                                         class="rounded"
                                         src="{{ asset($item->product->image ?? '') }}">

                                    <div>
                                        {{ $item->product->product_name ?? 'N/A' }}
                                        <small class="text-muted d-block">
                                            Qty: {{ $item->quantity }}
                                        </small>
                                    </div>

                                </div>
                            @endforeach
                        </td>

                        <td>
                            <span class="badge
                                @if($order->status=='completed') bg-success
                                @elseif($order->status=='pending') bg-warning
                                @else bg-danger @endif">

                                {{ ucfirst($order->status) }}

                            </span>
                        </td>

                        <td>
                            {{ $order->created_at->format('d M, Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No Orders Found
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection