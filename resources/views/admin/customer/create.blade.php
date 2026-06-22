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
                @include('admin.include.message')

                <div class="row">

                    <div class="col-lg-6">
                        <label>First Name *</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Password *</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Mobile *</label>
                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                        @error('mobile')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>

                <button class="btn btn-info mt-3">Save</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a>

            </div>
        </div>

    </form>

</div>

@endsection