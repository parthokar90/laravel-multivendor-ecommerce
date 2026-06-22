@extends('admin.layout.master')

@section('title') Customer List @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Customer List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Customer List</h3>
                    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Customer
                    </a>
                </div>
                <div class="card-body">
                    @include('admin.include.message')
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Customer Name</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('customers.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false 
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    responsive: true
                },
            ]
        });
    });
</script>
@endsection