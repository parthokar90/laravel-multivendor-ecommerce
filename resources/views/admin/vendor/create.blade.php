@extends('admin.layout.master')

@section('title') Create Vendor @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Create Vendor</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    @include('admin.include.message')

                    <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">

                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0" style="font-size: 1.25rem;"><i class="far fa-user"></i> Profile Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">First Name <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" value="{{ old('first_name') }}" placeholder="Enter First Name" />
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Last Name <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" value="{{ old('last_name') }}" placeholder="Enter Last Name" />
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Valid Email <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" placeholder="Enter Email Address" />
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Enter Secure Password" />
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Select Country <span class="text-danger">*</span></label>
                                                    <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                                                        <option value="">-- Select Country --</option>
                                                        @foreach($country as $countrys)
                                                        <option value="{{ $countrys->id }}" {{ old('country_id') == $countrys->id ? 'selected' : '' }}>{{ $countrys->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country_id')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male</option>
                                                        <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>Female</option>
                                                        <option value="3" {{ old('gender') == '3' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Mobile <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('mobile') is-invalid @enderror" name="mobile" type="text" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" />
                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Vendor Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Address</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3" placeholder="Enter Full Address">{{ old('address') }}</textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0" style="font-size: 1.25rem;"><i class="fas fa-store"></i> Shop Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Shop Name <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" type="text" value="{{ old('shop_name') }}" placeholder="Enter Shop Name" />
                                                    @error('shop_name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Shop Status</label>
                                                    <select class="form-control" name="shop_status">
                                                        <option value="1" {{ old('shop_status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('shop_status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Shop Address</label>
                                                    <textarea class="form-control @error('shop_address') is-invalid @enderror" name="shop_address" rows="3" placeholder="Enter Shop Address">{{ old('shop_address') }}</textarea>
                                                    @error('shop_address')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-info btn-block py-2">
                                            <i class="fa fa-check"></i> Create Vendor
                                        </button>
                                        <a href="{{ route('vendors.index') }}" class="btn btn-secondary btn-block py-2 mt-2">
                                            <i class="fa fa-times"></i> Cancel
                                        </a>
                                    </div>
                                </div>

                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0" style="font-size: 1rem;"><i class="far fa-file-image"></i> Profile Image</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="form-group mb-0">
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                            <small class="text-muted d-block mt-1">Accepts: JPG, PNG, JPEG</small>
                                            @error('image')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h3 class="mb-0" style="font-size: 1rem;"><i class="far fa-file-image"></i> Shop Logo</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="form-group mb-0">
                                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                            <small class="text-muted d-block mt-1">Accepts: JPG, PNG, JPEG</small>
                                            @error('logo')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection