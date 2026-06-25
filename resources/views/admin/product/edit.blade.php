@extends('admin.layout.master')

@section('title') Edit Product @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Edit Product</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Edit Product</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-edit"></i> Update Product Details</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="brand_id">Brand <span class="text-danger">*</span></label>
                                <select class="form-control" id="brand_id" name="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brand as $b)
                                    <option value="{{ $b->id }}" {{ old('brand_id', $product->brand_id) == $b->id ? 'selected' : '' }}>{{ $b->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="shop_id">Shop <span class="text-danger">*</span></label>
                                <select class="form-control" id="shop_id" name="shop_id" required>
                                    <option value="">Select Shop</option>
                                    @foreach($shop as $s)
                                    <option value="{{ $s->id }}" {{ old('shop_id', $product->shop_id) == $s->id ? 'selected' : '' }}>{{ $s->shop_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="category_id" name="category_id[]" multiple required>
                                    @foreach($category as $c)
                                    <option value="{{ $c->id }}" {{ in_array($c->id, old('category_id', $product->category->pluck('category_id')->toArray())) ? 'selected' : '' }}>
                                        {{ $c->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required min="0">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="alert_quantity">Alert Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="alert_quantity" name="alert_quantity" value="{{ old('alert_quantity', $product->alert_quantity) }}" required min="0">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="stock_status">Stock Status <span class="text-danger">*</span></label>
                                <select class="form-control" id="stock_status" name="stock_status" required>
                                    <option value="In Stock" {{ old('stock_status', $product->stock_status) == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                    <option value="Out Of Stock" {{ old('stock_status', $product->stock_status) == 'Out Of Stock' ? 'selected' : '' }}>Out Of Stock</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="is_featured">Is Featured <span class="text-danger">*</span></label>
                                <select class="form-control" id="is_featured" name="is_featured" required>
                                    <option value="1" {{ old('is_featured', $product->is_featured) == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_featured', $product->is_featured) == '0' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cost_price">Cost Price <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control" id="cost_price" name="cost_price" value="{{ old('cost_price', $product->cost_price) }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="regular_price">Regular Price <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control" id="regular_price" name="regular_price" value="{{ old('regular_price', $product->regular_price) }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sale_price">Sale Price</label>
                                <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image">Product Feature Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <div class="mt-2">
                                    <img src="{{ $product->image ?? 'https://placehold.co/100x100/png' }}" class="img-thumbnail" width="100" id="main_image_preview">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tag">Tags (Comma separated)</label>
                                <input type="text" class="form-control" id="tag" name="tag" value="{{ old('tag', $product->tag) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Long Description</label>
                            <textarea class="form-control textarea" id="long_description" name="long_description" rows="6">{{ old('long_description', $product->long_description) }}</textarea>
                        </div>

                        <div class="card my-4 border-info">
                            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Product Attributes Custom Variations</h5>
                                <button type="button" class="btn btn-sm btn-light" id="add_attribute_row"><i class="fa fa-plus"></i> Add Variant Row</button>
                            </div>
                            <div class="card-body" id="attribute_wrapper">
                                @if($product->productAttributeValue->isNotEmpty())
                                @foreach($product->productAttributeValue as $index => $attValue)
                                <div class="row attribute-row align-items-end mb-3">
                                    <div class="col-md-2">
                                        <label>Type</label>
                                        <select name="type_id[]" class="form-control type-select" required>
                                            <option value="">Select Type</option>
                                            @foreach($attributeType as $t)
                                            <option value="{{ $t->id }}" {{ $attValue->type_id == $t->id ? 'selected' : '' }}>{{ $t->attribute_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Value</label>
                                        <select name="value_id[]" class="form-control value-select" required data-selected="{{ $attValue->value_id }}">
                                            <option value="">Select Value</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Qty</label>
                                        <input type="number" name="att_qty[]" class="form-control" value="{{ $attValue->quantity }}" required min="0">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Alert Qty</label>
                                        <input type="number" name="att_alert_qty[]" class="form-control" value="{{ $attValue->alert_quantity }}" required min="0">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Price</label>
                                        <input type="number" step="0.01" name="att_sale_price[]" class="form-control" value="{{ $attValue->sale_price }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Image</label>
                                        <input type="file" name="att_image[]" class="form-control-file mb-1">
                                        @if($attValue->image)
                                        <img src="{{ $attValue->image }}" class="img-thumbnail d-block" width="50">
                                        @endif
                                        <button type="button" class="btn btn-sm btn-danger remove-row mt-1"><i class="fa fa-trash"></i> Remove</button>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Dynamic addition of attribute row structure templates
        $('#add_attribute_row').on('click', function() {
            let rowHtml = `
            <div class="row attribute-row align-items-end mb-3">
                <div class="col-md-2">
                    <label>Type</label>
                    <select name="type_id[]" class="form-control type-select" required>
                        <option value="">Select Type</option>
                        @foreach($attributeType as $t)
                            <option value="{{ $t->id }}">{{ $t->attribute_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Value</label>
                    <select name="value_id[]" class="form-control value-select" required>
                        <option value="">Select Value</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Qty</label>
                    <input type="number" name="att_qty[]" class="form-control" required min="0">
                </div>
                <div class="col-md-2">
                    <label>Alert Qty</label>
                    <input type="number" name="att_alert_qty[]" class="form-control" required min="0">
                </div>
                <div class="col-md-2">
                    <label>Price</label>
                    <input type="number" step="0.01" name="att_sale_price[]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>Image</label>
                    <input type="file" name="att_image[]" class="form-control-file mb-1">
                    <button type="button" class="btn btn-sm btn-danger remove-row mt-1"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>`;
            $('#attribute_wrapper').append(rowHtml);
        });

        // Handle structural row removal
        $(document).on('click', '.remove-row', function() {
            $(this).closest('.attribute-row').remove();
        });

        // Cascade Ajax call logic handling corresponding attribute value options
        function loadValues(typeSelectElement, selectedValueId = null) {
            let typeId = $(typeSelectElement).val();
            let valueSelect = $(typeSelectElement).closest('.attribute-row').find('.value-select');

            if (typeId) {
                // Adjust this URL placeholder to exactly match your named routing logic if necessary
                let targetUrl = "{{ url('admin/products/attribute-value') }}/" + typeId;

                $.ajax({
                    url: targetUrl,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        valueSelect.empty().append('<option value="">Select Value</option>');
                        $.each(data, function(key, value) {
                            let isSelected = (selectedValueId && selectedValueId == value.id) ? 'selected' : '';
                            valueSelect.append(`<option value="${value.id}" ${isSelected}>${value.value}</option>`);
                        });
                    }
                });
            } else {
                valueSelect.empty().append('<option value="">Select Value</option>');
            }
        }

        // Catch runtime change events for cascade loaders
        $(document).on('change', '.type-select', function() {
            loadValues(this);
        });

        // Initialize pre-existing dynamic loops upon initial page boot load sequence
        $('.type-select').each(function() {
            let preSelectedValue = $(this).closest('.attribute-row').find('.value-select').data('selected');
            if (preSelectedValue) {
                loadValues(this, preSelectedValue);
            }
        });
    });
</script>
@endsection