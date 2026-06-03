@extends('admin.layout.master')

@section('title') Attribute Create @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Category Create</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include('admin.include.message')
    <div class="row">
        <div class="col-md-6 col-md-6 col-md-6 col-md-6 col-md-6">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('attributes.store')}}" method="post">
                        @csrf 
 
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span> (Note: Color,Size)</label>
                            <div>
                                <input type="text" name="attribute_type" value="{{old('attribute_type')}}" class="form-control" placeholder="Enter Type" />
                            </div>
                            @if($errors->has('attribute_type'))
                            <span class="text-danger"> {{$errors->first('attribute_type')}}</span>
                           @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button name="attributes_type" value="attributes_type" class="btn btn-primary" type="submit">
                                <i class="fa fa-check"></i>  Create
                            </button>
                            <button type="reset" class="btn btn-secondary m-l-5">
                                <i class="fas fa-sync-alt"></i>  Reset
                            </button>
                        </div>
                    </form>
                  </div>
             </div>
        </div>

        <div class="col-md-6 col-md-6 col-md-6 col-md-6 col-md-6">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('attributes.store')}}" method="post" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <label for="status">Select Type <span class="text-danger">*</span></label>
                            <select class="form-control" name="type" id="type">
                              <option value="">Select</option>
                                @foreach($type as  $types) 
                                 <option value="{{$types->id}}">{{$types->attribute_type}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                            <span class="text-danger"> {{$errors->first('type')}}</span>
                           @endif
                        </div>
 
                        <div class="form-group">
                            <label>Value <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" name="value" value="{{old('value')}}" class="form-control" placeholder="Enter Value" />
                            </div>
                            @if($errors->has('value'))
                            <span class="text-danger"> {{$errors->first('value')}}</span>
                           @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-check"></i>  Create
                            </button>
                            <button type="reset" class="btn btn-secondary m-l-5">
                                <i class="fas fa-sync-alt"></i>  Reset
                            </button>
                        </div>
                    </form>
                  </div>
             </div>
        </div>
    </div>
</div>
@endsection 
