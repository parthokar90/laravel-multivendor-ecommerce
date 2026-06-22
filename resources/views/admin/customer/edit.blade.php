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
                    @include('admin.include.message')

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
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ old('first_name', $customer->first_name) }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Last Name --}}
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text"
                                    name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name', $customer->last_name) }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mt-3">
                                <label>Email *</label>
                                <input type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $customer->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6 mt-3">
                                <label>Password (optional)</label>
                                <input type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div class="col-md-6 mt-3">
                                <label>Mobile *</label>
                                <input type="text"
                                    name="mobile"
                                    class="form-control @error('mobile') is-invalid @enderror"
                                    value="{{ old('mobile', $customer->mobile) }}">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', $customer->status) == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ old('status', $customer->status) == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Address --}}
                            <div class="col-md-12 mt-3">
                                <label>Address</label>
                                <textarea name="address"
                                    class="form-control @error('address') is-invalid @enderror">{{ old('address', $customer->address) }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Current Image (Direct Public Link Integration) --}}
                            <div class="col-md-12 mt-3">
                                <label>Current Image</label><br>
                                @if($customer->image)
                                    <img src="{{ $customer->image }}"
                                        width="120"
                                        style="border-radius:6px; border: 1px solid #ddd; padding: 4px;">
                                @else
                                    <p class="text-muted">No Image Stored</p>
                                @endif
                            </div>

                            {{-- New Image --}}
                            <div class="col-md-12 mt-3">
                                <label>Change Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
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