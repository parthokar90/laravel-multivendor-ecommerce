@extends('admin.layout.master')

@section('title') Order #{{ $order->id }} Profiles @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Detailed Context for Invoice #{{ $order->id }}</h1>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm float-right"><i class="fa fa-arrow-left"></i> Back to Logs</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Metadata Matrix</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <tr>
                            <strong>
                                <th>Customer Name:</th>
                            </strong>
                            <td>{{ $order->customer ? $order->customer->first_name : 'Verified Customer' }}</td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Customer ID:</th>
                            </strong>
                            <td><code>#{{ $order->user_id }}</code></td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Charge Reference:</th>
                            </strong>
                            <td><code>{{ $order->charge_id ?? 'N/A' }}</code></td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Coupon Code:</th>
                            </strong>
                            <td>{{ $order->coupon_id ?? 'None Applied' }}</td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Order Created:</th>
                            </strong>
                            <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Status Flag:</th>
                            </strong>
                            <td>
                                @if($order->status == 'completed') <span class="badge badge-success">Completed</span>
                                @elseif($order->status == 'cancelled') <span class="badge badge-danger">Cancelled</span>
                                @else <span class="badge badge-warning">Pending</span> @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Geographic Logistics Address</h5>
                </div>
                <div class="card-body">
                    <strong>Shipping Route Destination:</strong>
                    <p class="text-muted mb-2">{{ $order->ship_address ?? 'N/A' }} ({{ $order->ship_location ?? 'No Coordinates' }})</p>
                    <hr>
                    <strong>Billing Route Destination:</strong>
                    <p class="text-muted mb-0">{{ $order->bill_address ?? 'N/A' }} ({{ $order->bill_location ?? 'No Coordinates' }})</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Cart Items Specification</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Profile</th>
                                <th>Vendor ID Mapping</th>
                                <th>Quantity Purchased</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    @if($item->product)
                                    <img src="{{ $item->product->image }}" width="40" class="mr-2 rounded">
                                    <strong>{{ $item->product->product_name }}</strong>
                                    @else
                                    <span class="text-muted">Product Record Purged</span>
                                    @endif
                                </td>
                                <td><code>Vendor ID: #{{ $item->vendor_id }}</code></td>
                                <td>{{ $item->quantity }} Units</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection