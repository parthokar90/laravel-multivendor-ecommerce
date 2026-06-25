@extends('admin.layout.master')

@section('title') Create Product @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="h3 m-0 text-gray-800">Create Product</h1>
            <ol class="breadcrumb bg-transparent p-0 m-0 small">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create Product</li>
            </ol>
        </div>
    </div>

    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-9 col-lg-8">

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label font-weight-bold">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter product title..." value="{{ old('product_name') }}" />
                            @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label font-weight-bold">Product Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('long_description') is-invalid @enderror" rows="6" name="long_description" placeholder="Provide a detailed description of the product...">{{ old('long_description') }}</textarea>
                            @error('long_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active py-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"><i class="fas fa-sliders-h mr-2"></i>General</a>
                                    <a class="nav-link py-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"><i class="fas fa-boxes mr-2"></i>Inventory</a>
                                    <a class="nav-link py-3" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"><i class="fas fa-truck mr-2"></i>Shipping</a>
                                    <a class="nav-link py-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"><i class="fas fa-tags mr-2"></i>Attributes</a>
                                    <a class="nav-link py-3" id="v-pills-tag-tab" data-toggle="pill" href="#v-pills-tag" role="tab"><i class="fas fa-search mr-2"></i>SEO</a>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="tab-content pl-3" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
                                        <h5 class="mb-4 text-gray-800 border-bottom pb-2">General Pricing</h5>
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <label class="small font-weight-bold">Regular Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" name="regular_price" value="0" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label class="small font-weight-bold">Sale Price</label>
                                                <input type="number" step="0.01" name="sale_price" value="0" class="form-control" />
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label class="small font-weight-bold">Cost Price</label>
                                                <input type="number" step="0.01" name="cost_price" value="0" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel">
                                        <h5 class="mb-4 text-gray-800 border-bottom pb-2">Stock Management</h5>
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold">Stock Status</label>
                                            <select class="form-control custom-select" name="stock_status">
                                                <option value="1">In Stock</option>
                                                <option value="0">Out Of Stock</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label class="small font-weight-bold">Stock Quantity</label>
                                                <input type="number" name="quantity" value="0" class="form-control" />
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label class="small font-weight-bold">Alert Quantity</label>
                                                <input type="number" name="alert_quantity" value="0" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel">
                                        <h5 class="mb-4 text-gray-800 border-bottom pb-2">Logistics</h5>
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold">Dimensions / Package Info</label>
                                            <input type="text" name="dimension" class="form-control" placeholder="e.g., 10x20x30 cm, 1.5kg" />
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel">
                                        <h5 class="mb-4 text-gray-800 border-bottom pb-2">Product Variations</h5>
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label class="small font-weight-bold">Select Type</label>
                                                <select class="form-control custom-select" id="attribute_type">
                                                    <option value="">Choose attribute type...</option>
                                                    @foreach($attributeType as $types)
                                                    <option myselect="{{$types->attribute_type}}" value="{{$types->id}}">{{$types->attribute_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label class="small font-weight-bold">Value</label>
                                                <select class="form-control custom-select" id="att_value">
                                                    <option value="">Select Type First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-success btn-sm mb-3" id="add_att">
                                            <i class="fa fa-plus mr-1"></i> Add Variation
                                        </button>

                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover align-middle border" id="att_table" style="display:none">
                                                <thead class="bg-light text-muted small uppercase">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Value</th>
                                                        <th style="width: 80px;">Qty</th>
                                                        <th style="width: 80px;">Alert</th>
                                                        <th style="width: 90px;">Price</th>
                                                        <th>Image</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-tag" role="tabpanel">
                                        <h5 class="mb-4 text-gray-800 border-bottom pb-2">Search Engine Optimization</h5>
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold">Meta Tags / Keywords</label>
                                            <input type="text" name="tag" class="form-control" placeholder="Separated by commas (e.g. tech, laptop, modern)" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <label class="form-label font-weight-bold">Short Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" rows="3" name="short_description" placeholder="Brief summary displayed on listings page...">{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4">

                <div class="card shadow-sm mb-4">
                    <div class="card-body p-3">
                        <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold shadow-sm">
                            <i class="fa fa-check mr-2"></i> Save Product
                        </button>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="fas fa-star text-warning mr-2"></i>Visibility Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="f1" name="is_featured" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="f1">Featured Product</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="f2" name="is_featured" value="0" class="custom-control-input" checked>
                            <label class="custom-control-label" for="f2">Standard Product</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="fas fa-folder text-info mr-2"></i>Categories <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body pt-2">
                        @error('category_id')
                        <div class="alert alert-danger p-2 small">{{ $message }}</div>
                        @enderror
                        <div class="border rounded p-3 bg-light" style="max-height: 220px; overflow-y: auto;">
                            @foreach($category as $categorys)
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="cat_{{$categorys->id}}" name="category_id[]" value="{{$categorys->id}}">
                                <label class="custom-control-label font-weight-bold" for="cat_{{$categorys->id}}">{{$categorys->category_name}}</label>
                            </div>
                            @foreach($categorys->subCategory as $child)
                            <div class="custom-control custom-checkbox mb-2 ml-4">
                                <input type="checkbox" class="custom-control-input" id="cat_{{$child->id}}" name="category_id[]" value="{{$child->id}}">
                                <label class="custom-control-label text-muted" for="cat_{{$child->id}}">{{$child->category_name}}</label>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="fas fa-copyright text-muted mr-2"></i>Brand Association <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <select class="form-control custom-select" name="brand_id">
                            @foreach($brand as $brands)
                            <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="fas fa-store text-muted mr-2"></i>Select Shop <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <select class="form-control custom-select" name="shop_id">
                            @foreach($shop as $shops)
                            <option value="{{$shops->id}}">{{$shops->shop_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="far fa-image text-success mr-2"></i>Main Preview Image <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
                        <h6 class="font-weight-bold text-gray-800 m-0"><i class="fas fa-images text-purple mr-2"></i>Product Gallery Images</h6>
                    </div>
                    <div class="card-body">
                        <div class="gap-2 d-flex flex-column">
                            <input type="file" name="gallery[]" class="form-control-file mb-2" accept="image/*">
                            <input type="file" name="gallery[]" class="form-control-file mb-2" accept="image/*">
                            <input type="file" name="gallery[]" class="form-control-file mb-2" accept="image/*">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
    // Attribute dynamic routing execution fix syntax logic 
    $("#attribute_type").change(function() {
        let id = $(this).val();
        if (!id) return;

        $.ajax({
            type: 'GET',
            url: "{{ url('att/value') }}/" + id,
            success: function(response) {
                var schema_one = '';
                $.each(response, function(i, item) {
                    schema_one += '<option value="' + item.id + '">' + item.attribute + '</option>';
                });
                $('#att_value').html(schema_one);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    // Appending dynamic markup structure configuration
    $("#add_att").click(function() {
        let att_type = $("#attribute_type").val();
        if (att_type === '') {
            alert('Select type first');
            return false;
        }
        let types = $("#attribute_type :selected").text();
        let types_val = $("#attribute_type :selected").val();
        let values = $("#att_value :selected").text();
        let values_val = $("#att_value :selected").val();

        let dynamicRow = `
            <tr> 
                <td class="align-middle"><input type="hidden" name="type_id[]" value="${types_val}">${types}</td> 
                <td class="align-middle"><input type="hidden" name="value_id[]" value="${values_val}">${values}</td> 
                <td><input type="number" class="form-control form-control-sm" name="att_qty[]" style="width:70px"></td> 
                <td><input type="number" class="form-control form-control-sm" name="att_alert_qty[]" style="width:70px"></td> 
                <td><input type="number" class="form-control form-control-sm" name="att_sale_price[]" style="width:80px"></td> 
                <td><input type="file" class="form-control-file small" name="att_image[]"></td> 
                <td class="text-center align-middle"><button type="button" class="btn btn-sm btn-link text-danger remove-row p-0"><i class="fas fa-trash"></i></button></td> 
            </tr>`;

        $("#att_table tbody").append(dynamicRow);
        $("#att_table").show();
    });

    // Delete handling loop execution
    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        if ($("#att_table tbody tr").length === 0) {
            $("#att_table").hide();
        }
    });
</script>
@endsection