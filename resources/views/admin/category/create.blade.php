@extends('admin.layout.master')

@section('title') Create Category @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <label for="parent_id">Select Parent</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                              <option value="0">Select</option>
                               @foreach($categorys as $item)
                                 <option value="{{ $item->id }}" {{ old('parent_id')==$item->id ? 'selected' : ''  }}>{{ $item->category_name }}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category Name <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" name="category_name" value="{{old('category_name')}}" class="form-control" placeholder="Category Name" />
                            </div>
                            @if($errors->has('category_name'))
                            <span class="text-danger"> {{$errors->first('category_name')}}</span>
                           @endif
                        </div>
                    
                        <div class="form-group">
                            <label>Image </label>
                            <div>
                                <input type="file" class="form-control" name="image">
                            </div>
                            @if($errors->has('image'))
                            <span class="text-danger"> {{$errors->first('image')}}</span>
                           @endif
                        </div>

                        <div class="form-group">
                            <label for="category_type">Category Type</label>
                            <select class="form-control" name="category_type" id="category_type">
                              <option value="1" selected>Category</option>
                              <option value="2">Blog</option>
                            </select>
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
