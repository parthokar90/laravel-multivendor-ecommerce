@extends('admin.layout.master')

@section('title') Order Dashboard & List @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Order Matrix Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white text-center p-3 shadow-sm">
                <h3>{{ $stats['total'] }}</h3>
                <h6>Total Orders</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark text-center p-3 shadow-sm">
                <h3>{{ $stats['pending'] }}</h3>
                <h6>Pending Requests</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white text-center p-3 shadow-sm">
                <h3>{{ $stats['completed'] }}</h3>
                <h6>Completed Deliveries</h6>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white text-center p-3 shadow-sm">
                <h3>{{ $stats['cancelled'] }}</h3>
                <h6>Cancelled Orders</h6>
            </div>
        </div>
    </div>

    <div class="card mb-3 shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3><i class="fa fa-shopping-cart"></i> Master Order Tracking Registry</h3>
        </div>
        <div class="card-body">
            @include('admin.include.message')
            <div class="table-responsive">
                <table class="table table-bordered table-hover order-datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order Date</th>
                            <th>Customer Identification</th>
                            <th>Current Status</th>
                            <th>Action Handles</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.order-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('orders.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'order_date',
                    name: 'order_date'
                },
                {
                    data: 'customer',
                    name: 'user_id'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endsection