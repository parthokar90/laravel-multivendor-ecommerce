@extends('admin.layout.master')

@section('title') Create Customer @endsection

@section('content')

<div class="container-fluid">

    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3>Create Customer</h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-6">
                        <label>First Name *</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>

                    <div class="col-lg-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Password *</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Mobile *</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>

                <button class="btn btn-info mt-3">Save</button>

            </div>
        </div>

    </form>

</div>

@endsection