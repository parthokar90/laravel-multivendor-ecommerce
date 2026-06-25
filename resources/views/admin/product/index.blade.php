@extends('admin.layout.master')

@section('title') Product Dashboard & List @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Product Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body bg-primary text-center">
                    <h1>{{ $stats['total'] }}</h1>
                    <h6>Total Products</h6>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body bg-success text-center">
                    <h1>{{ $stats['active'] }}</h1>
                    <h6>Active Products</h6>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body bg-danger text-center">
                    <h1>{{ $stats['inactive'] }}</h1>
                    <h6>Inactive Products</h6>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body bg-warning text-center">
                    <h1>{{ $stats['out_of_stock'] }}</h1>
                    <h6>Out of Stock</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-list"></i> Product Management</h3>
                </div>
                <div class="card-body">
                    @include('admin.include.message')
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Qty</th>
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
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'brand',
                    name: 'brand.brand_name'
                },
                {
                    data: 'category',
                    name: 'category.categoryName.category_name',
                    orderable: false
                },
                {
                    data: 'quantity',
                    name: 'quantity'
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