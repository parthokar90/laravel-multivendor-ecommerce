@extends('admin.layout.master')

@section('title') Review & Update Order #{{ $order->id }} @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Manage Order Lifecycle & Status</h1>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm float-right"><i class="fa fa-arrow-left"></i> Back to Logs</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Top Section: Visualizing Order & Customer Context -->
    <div class="row">
        <div class="col-md-4">
            <!-- Customer & Invoice Summary Card -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fa fa-user"></i> Customer & Invoice Info</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <tr>
                            <strong>
                                <th>Customer Name:</th>
                            </strong>
                            <td>{{ $order->customer ? $order->customer->name : 'Verified Customer' }}</td>
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
                                <th>System Log Date:</th>
                            </strong>
                            <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Geographic Logistics Address Block -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fa fa-map-marker"></i> Delivery Logistics Route</h5>
                </div>
                <div class="card-body">
                    <strong>Shipping Address:</strong>
                    <p class="text-muted mb-2">{{ $order->ship_address ?? 'N/A' }} ({{ $order->ship_location ?? 'No Coordinates' }})</p>
                    <hr>
                    <strong>Billing Address:</strong>
                    <p class="text-muted mb-0">{{ $order->bill_address ?? 'N/A' }} ({{ $order->bill_location ?? 'No Coordinates' }})</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Cart Items Specification Table -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fa fa-shopping-basket"></i> Purchased Product Logs</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Profile</th>
                                <th>Vendor ID Mapping</th>
                                <th>Quantity Ordered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    @if($item->product)
                                    <img src="{{ $item->product->image }}" width="40" class="mr-2 rounded" style="object-fit: cover;">
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

            <!-- Operational Pipeline Mutation Panel -->
            <div class="card shadow-sm border-primary mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-refresh"></i> Transition Order Pipeline State</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="status" class="font-weight-bold text-dark">Active Order Status Flag</label>
                            <select name="status" id="status" class="form-control form-control-lg border-primary" required>
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>🕒 Pending Processing</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>✅ Completed / Dispatched</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>❌ Cancelled / Voided</option>
                            </select>
                            <small class="form-text text-muted">Changing this state directly shifts the inventory and order dashboard states analytics workflows globally.</small>
                        </div>

                        <hr>
                        <div class="text-right">
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-md">Abort Changes</a>
                            <button type="submit" class="btn btn-success btn-md px-4"><i class="fa fa-save"></i> Save Status Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection