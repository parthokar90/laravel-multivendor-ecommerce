@extends('admin.layout.master')

@section('title') Category List @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Category List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                       @include('admin.include.message')
                       <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Image</th>
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
    $(function () {
      var table = $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('categories.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'category_name', name: 'category_name'},
              {data: 'image', name: 'image'},
              {data: 'status', name: 'status'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true,
                  responsive: true
              },
          ]
      });
    });
  </script>
@endsection 
