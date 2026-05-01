@extends('admin.layout.master')

@section('title') Edit Customer @endsection

@section('content')

<div class="container-fluid">

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xl-12">
                <div class="card mb-3">

                    <div class="card-header">
                        <h3><i class="far fa-user"></i> Edit Customer</h3>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            {{-- First Name --}}
                            <div class="col-lg-6">
                                <label>First Name *</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $customer->first_name }}">
                            </div>

                            {{-- Last Name --}}
                            <div class="col-lg-6">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                    value="{{ $customer->last_name }}">
                            </div>

                            {{-- Email --}}
                            <div class="col-lg-6 mt-3">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $customer->email }}">
                            </div>

                            {{-- Password --}}
                            <div class="col-lg-6 mt-3">
                                <label>Password (leave blank if not change)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            {{-- Mobile --}}
                            <div class="col-lg-6 mt-3">
                                <label>Mobile *</label>
                                <input type="text" name="mobile" class="form-control"
                                    value="{{ $customer->mobile }}">
                            </div>

                            {{-- Status --}}
                            <div class="col-lg-6 mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            {{-- Address --}}
                            <div class="col-lg-12 mt-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
                            </div>

                            {{-- Current Image --}}
                            <div class="col-lg-12 mt-3">
                                <label>Current Image</label><br>

                                @if($customer->image)
                                <img src="{{ asset('uploads/customer/'.$customer->image) }}"
                                    width="100" style="border-radius:5px;">
                                @else
                                <p>No Image</p>
                                @endif
                            </div>

                            {{-- New Image --}}
                            <div class="col-lg-12 mt-3">
                                <label>Change Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                        </div>

                        <button class="btn btn-success mt-4">
                            Update Customer
                        </button>

                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-4">
                            Back
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </form>

</div>

@endsection@extends('admin.layout.master')

@section('title') Edit Customer @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Customer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $customer->first_name) }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $customer->last_name) }}">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $customer->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password (leave blank if not changing)</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile *</label>
                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile', $customer->mobile) }}" required>
                                    @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="1" {{ old('status', $customer->status) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $customer->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $customer->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Current Image</label>
                                    @if($customer->image)
                                        <img src="{{ asset('uploads/customer/'.$customer->image) }}" class="img-thumbnail" width="150">
                                    @else
                                        <p>No image</p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Change Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Customer</button>
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
