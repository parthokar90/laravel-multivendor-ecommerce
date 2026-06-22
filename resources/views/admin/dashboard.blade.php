@extends('admin.layout.master')

@section('title') Dashboard @endsection

@section('content')

<div class="container-fluid">
    {{-- Breadcrumb Holder --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard Overview</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{-- Session Alert Messages for Actions --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Rejected!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{-- E-commerce Analytics Cards (Top 4 Cards) --}}
    <div class="row">
        {{-- Card 1: Total Sales --}}
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="card-box noradius noborder bg-purple p-3" style="min-height: 140px; position: relative; overflow: hidden;">
                <i class="fas fa-money-bill-wave text-white-50 fa-2x" style="position: absolute; right: 15px; top: 15px; opacity: 0.3;"></i>

                <h6 class="text-white text-uppercase m-b-10" style="letter-spacing: 0.5px; font-size: 12px; opacity: 0.8;">Total Earnings</h6>

                <h3 class="text-white font-weight-bold my-2"
                    style="white-space: nowrap; font-size: calc(1.1rem + 0.5vw); word-break: keep-all;">
                    BDT {{ number_format($totalEarnings, 2) }}
                </h3>

                <span class="text-white-50 d-block" style="font-size: 11px; white-space: nowrap;">
                    <i class="fas fa-caret-up text-success"></i> +BDT {{ number_format($todayEarnings, 2) }} Today
                </span>
            </div>
        </div>

        {{-- Card 2: Total Orders --}}
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Total Orders</h6>
                <h1 class="m-b-20 text-white counter">{{ number_format($totalOrders) }}</h1>
                <span class="text-white">{{ $pendingOrders }} Pending Approvals</span>
            </div>
        </div>

        {{-- Card 3: Total Vendors --}}
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="fas fa-store float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Active Vendors</h6>
                <h1 class="m-b-20 text-white counter">{{ $totalVendors }}</h1>
                <span class="text-white">{{ $pendingShops }} Shops Waiting Review</span>
            </div>
        </div>

        {{-- Card 4: Total Customers --}}
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Total Customers</h6>
                <h1 class="m-b-20 text-white counter">{{ number_format($totalCustomers) }}</h1>
                <span class="text-white">{{ $todayCustomers }} New Registrations Today</span>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-chart-line"></i> Monthly Sales & Revenue</h3>
                    Visual breakdown of platform gross merchandise value (GMV) and net profits.
                </div>
                <div class="card-body">
                    <canvas id="comboBarLineChart"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated just now</div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-chart-pie"></i> Top Performing Products</h3>
                    Analysis of most purchased items.
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated just now</div>
            </div>
        </div>
    </div>

    {{-- Middle Progress and Vendor Messages Section --}}
    <div class="row">
        {{-- Shop Verification & Product Audit Progress --}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-tasks"></i> Operational Health & Queue</h3>
                    Current status of administrative queues.
                </div>
                <div class="card-body">
                    <p class="font-600 mb-1">KYC & Document Verification <span class="text-success pull-right"><b>100% Cleared</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Pending Vendor Shop Approvals <span class="text-primary pull-right"><b>{{ $shopApprovalProgress }}% Handled</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: {{ $shopApprovalProgress }}%"></div>
                    </div>
                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Product Quality & Fake Item Audit <span class="text-warning pull-right"><b>60% Completed</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 60%"></div>
                    </div>
                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Payout & Vendor Withdrawal Requests <span class="text-danger pull-right"><b>12% Critical Queue</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 12%"></div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Real-time system health</div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-envelope"></i> Critical Store Notifications</h3>
                    Direct applications from platform vendors.
                </div>
                <div class="card-body">
                    <div class="widget-messages nicescroll" style="height: 310px;">
                        @forelse($criticalNotifications as $noti)
                        <a href="#">
                            <div class="message-item mb-2" style="border-bottom: 1px solid #eee; padding-bottom: 8px;">
                                <p class="message-item-user text-danger mb-0"><i class="fas fa-exclamation-triangle"></i> {{ $noti['store'] }} (Vendor)</p>
                                <p class="message-item-msg mb-0 text-muted" style="font-size: 13px;">{{ $noti['msg'] }}</p>
                                <p class="message-item-date text-primary" style="font-size: 11px;">{{ $noti['time'] }}</p>
                            </div>
                        </a>
                        @empty
                        <p class="text-center text-muted mt-5">No critical notifications found.</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated just now</div>
            </div>
        </div>
    </div>

    {{-- Bottom Section: Shops Awaiting Verification Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-store-alt"></i> New Shop Registrations (Awaiting Approval)</h3>
                    Review vendor store application details.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Vendor Name</th>
                                    <th>Email Address</th>
                                    <th>Trade License Status</th>
                                    <th>Joined Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendingShopLists as $shop)
                                <tr>
                                    <td><strong>{{ $shop->shop_name }}</strong></td>
                                    <td>{{ $shop->vendor->first_name ?? 'N/A' }} {{ $shop->vendor->last_name ?? '' }}</td>
                                    <td>{{ $shop->vendor->email ?? 'N/A' }}</td>
                                    <td>
                                        @if($shop->status == 0)
                                        <span class="badge bg-warning text-dark">Under Review</span>
                                        @else
                                        <span class="badge bg-success text-white">Verified</span>
                                        @endif
                                    </td>
                                    <td>{{ $shop->created_at ? $shop->created_at->format('Y-m-d') : 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('admin.shop.approve', $shop->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to approve this shop?')">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.shop.reject', $shop->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to reject this shop?')">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No pending shop registrations found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Pending items require manual intervention</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx1 = document.getElementById('comboBarLineChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    type: 'line',
                    label: 'Monthly Net Revenue (BDT)',
                    borderColor: '#6f42c1',
                    borderWidth: 3,
                    fill: false,
                    data: @json($chartEarnings)
                }, {
                    type: 'bar',
                    label: 'Gross Volume Gross (BDT)',
                    backgroundColor: '#007bff',
                    data: @json($chartEarnings),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('barChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($categoryLabels).length ? @json($categoryLabels) : ['No Data'],
                datasets: [{
                    label: 'Units Sold Count',
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8', '#343a40'],
                    data: @json($categoryCounts).length ? @json($categoryCounts) : [0]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection