@extends('admin.layout.master')

@section('title') Attribute Edit @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Attribute Edit</li>
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
                    <form action="{{route('attributes.update',$attribute->id)}}" method="post">
                        @csrf 
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span> (Note: Color,Size)</label>
                            <div>
                                <input type="text" name="attribute_type" value="{{$attribute->attribute_type}}" class="form-control" placeholder="Enter Type" />
                            </div>
                            @if($errors->has('attribute_type'))
                              <span class="text-danger"> {{$errors->first('attribute_type')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                             <select class="form-control" name="status" id="status">
                                @if($attribute->status==1) 
                                  <option value="1" selected>Active</option>
                                  <option value="0">Inactive</option>
                                 @else 
                                   <option value="1">Active</option>
                                   <option value="0" selected>Inactive</option>
                                 @endif  
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button name="attributes_type" value="attributes_type" class="btn btn-primary" type="submit">
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

        <div class="col-md-6 col-md-6 col-md-6 col-md-6 col-md-6">
            <div class="card mb-3">
                  <div class="card-body">
                    @if($errors->has('attribute'))
                    <span class="text-danger"> {{$errors->first('attribute')}}</span>
                  @endif
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Value</th>
                                    <th>Status</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attribute->attributeValues as $key=>$item)
                                   <form action="{{route('attribute.value',$item->id)}}" method="post">
                                     @csrf 
                                    <tr>
                                      <td>{{++$key}}</td>
                                       <td>
                                           <input type="text" class="form-control" name="attribute" value="{{$item->attribute}}">
                                        </td>
                                      <td>
                                        <select class="form-control" name="status" id="status">
                                            @if($item->status==1) 
                                             <option value="1" selected>Active</option>
                                             <option value="0">Inactive</option>
                                             @else 
                                             <option value="1">Active</option>
                                             <option value="0" selected>Inactive</option>
                                            @endif  
                                          </select>
                                      </td>
                                      <td>
                                        <button name="attributes_value" value="attributes_value" class="btn btn-primary" type="submit">
                                            <i class="fa fa-check"></i>
                                        </button>
                                     </td>
                                   </tr>
                                 </form>
                                @endforeach 
                            </tbody>
                        </table>
                     </div>
                 </div>
             </div>
        </div>
    </div>
</div>
@endsection 
