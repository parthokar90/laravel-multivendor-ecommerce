@extends('admin.layout.master')

@section('title') Edit Customer @endsection

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h3>Edit Customer</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('customers.update', $customer->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- First Name --}}
                            <div class="col-md-6">
                                <label>First Name *</label>
                                <input type="text"
                                       name="first_name"
                                       class="form-control"
                                       value="{{ old('first_name', $customer->first_name) }}">
                            </div>

                            {{-- Last Name --}}
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text"
                                       name="last_name"
                                       class="form-control"
                                       value="{{ old('last_name', $customer->last_name) }}">
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mt-3">
                                <label>Email *</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', $customer->email) }}">
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6 mt-3">
                                <label>Password (optional)</label>
                                <input type="password"
                                       name="password"
                                       class="form-control">
                            </div>

                            {{-- Mobile --}}
                            <div class="col-md-6 mt-3">
                                <label>Mobile *</label>
                                <input type="text"
                                       name="mobile"
                                       class="form-control"
                                       value="{{ old('mobile', $customer->mobile) }}">
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control">

                                    <option value="1"
                                        {{ $customer->status == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="0"
                                        {{ $customer->status == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-12 mt-3">
                                <label>Address</label>
                                <textarea name="address"
                                          class="form-control">{{ old('address', $customer->address) }}</textarea>
                            </div>

                            {{-- Current Image --}}
                            <div class="col-md-12 mt-3">
                                <label>Current Image</label><br>

                                @if($customer->image)
                                    <img src="{{ asset('uploads/customer/'.$customer->image) }}"
                                         width="120"
                                         style="border-radius:6px;">
                                @else
                                    <p>No Image</p>
                                @endif
                            </div>

                            {{-- New Image --}}
                            <div class="col-md-12 mt-3">
                                <label>Change Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                        </div>

                        <button class="btn btn-success mt-4">
                            Update Customer
                        </button>

                        <a href="{{ route('customers.index') }}"
                           class="btn btn-secondary mt-4">
                            Back
                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection