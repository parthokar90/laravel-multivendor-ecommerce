@extends('admin.layout.master')

@section('title') Category Edit @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Category Edit</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="parent_id">Select Parent</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="0">Select</option>
                                 @foreach($categorys as $item)
                                        @php $selected=''; @endphp
                                        @if($item->id == $category->parent_id)
                                            @php  $selected = 'selected'; @endphp 
                                        @endif 
                                    <option value="{{$item->id}}" {{$selected}}>{{$item->category_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name </label>
                            <div>
                                <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Category Name" />
                            </div>
                            @if($errors->has('category_name'))
                            <span class="text-danger"> {{$errors->first('category_name')}}</span>
                           @endif
                        </div>
                        <div class="form-group">
                            <img src="{{asset('admin/category/'.$category->image)}}" width="50px" heighr="50px">
                            <label>Image <span class="text-danger">*</span></label>
                            <div>
                                <input type="file" class="form-control" name="image">
                            </div>
                            @if($errors->has('image'))
                            <span class="text-danger"> {{$errors->first('image')}}</span>
                           @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                              @if($category->status==1)
                              <option value="1" selected>Active</option>
                              <option value="0">Inactive</option>
                                @else 
                                <option value="1">Active</option>
                                <option value="0" selected>Inactive</option>
                              @endif
                            </select>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-check"></i>  Update 
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
