@extends('admin.layout.master')

@section('title') Create Product @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                       @include('admin.include.message')
                       <form method="post" action="">
                       
                         <div class="row">
                           <div class="col-md-9">
                             
                             <div class="form-group">
                              <label>Product Name</label>
                               <input type="text" class="form-control" placeholder="Product Name"/>
                             </div>

                             <div class="form-group">
                              <label>Product Description</label>
                               <textarea class="form-control" name="" placeholder="Product Description"></textarea>
                             </div>


                             <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Inventory</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Shipping</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Attribute</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                     <h4>General Information</h4>

                                       <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="text" class="form-control" placeholder="Regular Price"/>
                                       </div>

                                       <div class="form-group">
                                        <label>Sell Price</label>
                                        <input type="text" class="form-control" placeholder="Sell Price"/>
                                       </div>

                                       <div class="form-group">
                                        <label>Cost Price</label>
                                        <input type="text" class="form-control" placeholder="Cost Price"/>
                                       </div>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                      <h4>Stock Information</h4>
                                       <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="text" class="form-control" placeholder="Stock Quantity"/>
                                       </div>

                                       <div class="form-group">
                                        <label>Alert Quantity</label>
                                        <input type="text" class="form-control" placeholder="Alert Quantity"/>
                                       </div>
                                    
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                      <h4>Shipping Information</h4>
                                       <div class="form-group">
                                        <label>Shipping</label>
                                        <input type="text" class="form-control" placeholder="Shipping"/>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <h4>Attribute Information</h4>
                                     <div class="form-group">
                                        <label>Select Type</label>
                                        <select class="form-control" name="" id="attribute_type">
                                          <option value="">Select</option>
                                           @foreach($attributeType as $types)
                                             <option myselect="{{$types->attribute_type}}" value="{{$types->id}}">{{$types->attribute_type}}</option>
                                           @endforeach 
                                        </select>
                                     </div>

                                     <div class="form-group">
                                        <label>Value</label>
                                        <select class="form-control" name="" id="att_value">
                                          <option value="">Select Type First</option>
                                        </select>
                                     </div>

                                     <button type="button" class="btn btn-success" id="add_att"><i class="fa fa-plus"></i> Add</button>
                                     <div class="table-responsive">
                                     <table class="table table-bordered mt-3" id="att_table" style="display:none">
                                       <tr>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>Qty</th>
                                            <th>Alert Qty</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                       </tr>
                                     </table>
                                     </div>
                                     
                                    </div>
                                    </div>
                                </div>
                             </div>
                             <div class="form-group mt-3">
                              <label>Short Description</label>
                               <textarea class="form-control" name="" placeholder="Product Short Description"></textarea>
                             </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">

                            <div class="card mb-3">
                                <div class="card-body text-center">    
                                    <div class="row">    
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-info btn-block mt-3"> <i class="fa fa-check"></i> Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- end card-body -->

                              <div class="card mb-3">
                                  <div class="card-header">
                                      <h3><i class="fab fa-bandcamp"></i> Chose Brand</h3>
                                  </div>
                                  <div class="card-body text-center">
                                      <div class="row">
                                          <div class="col-lg-12">
                                           <select class="form-control">
                                             <option value="">1</option>
                                           </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> Product Image</h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <input type="file" name="image" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- end card-body -->

                             <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> Product Gallery </h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>                                
                             </div>
                           </div>
                         </div>
                      </div>
                  </div>
             </div>
        </div>
    </div>
</div>
<script>
// attribute value ajax request
 $("#attribute_type").change(function(){
    let id=$("#attribute_type").val(); 
    $.ajax({
               type:'GET',
               url:'{{url('att/value/')}}'+'/'+id,
               success:function(response) {
                var schema_one = '';
                $.each(response, function(i, item) {
                    schema_one += '<option value="' + item.id + '">' + item.attribute + '</option>';
                });
                $('#att_value').html(schema_one);
               },error:function(response){
                 console.log(response);
               }
            });
      });

 //attribute add click function
 $("#add_att").click(function(){
    let att_type = $("#attribute_type").val();
    if(att_type===''){
      alert('Select type first');
      return false;
    }
    let types = $("#attribute_type :selected").text();
    let values = $("#att_value :selected").text();
    $("#att_table").append('<tr> <td>'+types+'</td> <td>'+values+'</td> <td><input type="number" style="width:70px"></td> <td><input type="number" style="width:70px"></td> <td><input type="number" style="width:70px"></td> <td><input type="file"></td> <td>Delete</td> </tr>');
    $("#att_table").show();
 });
</script>
@endsection 
