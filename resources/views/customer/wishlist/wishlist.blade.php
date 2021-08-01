@extends('customer.layout.master')

@section('title') Wishlist @endsection

@section('content')
     <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Wishlist</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{route('customer.dashboard')}}" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @forelse($list as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->product->product_name}}</td>
                    <td><img width="50px" height="50px" src="{{asset('vendor/product/'.$item->product->image)}}"></td>
                    <td></td>
                </tr>
                @empty
                <p>No Data Found</p>
               @endforelse
            </table>
     </div>
@endsection