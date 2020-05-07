
@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="card card-block">
			        <div id="notify" class="alert alert-success" style="display:none;">
			            <a href="#" class="close" data-dismiss="alert">×</a>
			            <div class="message"></div>
			        </div>
			        @foreach($edit_pro as $edit_product)
			        <form method="post" action="{{action('ProductController@update',$edit_product->id)}}" enctype="multipart/form-data">
			        	{{ csrf_field() }}
			        	 @method('PUT')
			            <div class="card card-block">
			                <h5 class="mt-20 ml-17">Edit Product</h5>
			                <hr>
			                <input type="hidden" name="company_id" value="1">
			                <input type="hidden" name="product_id" value="{{$edit_product->id}}">
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_name">
			                        Product Name*</label>
			                    <div class="col-sm-6">
			                        <input type="text" placeholder="Product Name" class="form-control margin-bottom" value="{{$edit_product->product_name}}" required="" name="product_name">
			                    </div>
			                </div>

			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_cat">
			                        Product Category*</label>
			                    <div class="col-sm-6">
			                    	
			                        <select name="category_id" required id="category_id"class="form-control">
			                        @foreach($data as $row)
			                            <option value="{{$row->id}}"{{$row->id == $edit_product->category_id ? 'selected' : ''}}>{{$row->category_name}}</option>
			                        @endforeach 
			                        </select>
			                        
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_sub_cat">
			                        Subcategory*</label>
			                    <div class="col-sm-6">
			                      	<select name="sub_category" class="form-control">
			                      	@foreach($sub_category as $row)
			                            <option value="{{$row->id}}"{{$row->id == $edit_product->sub_category ? 'selected' : ''}}>{{$row->sub_category}}</option>
			                        @endforeach 
                       				 </select>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_cat">
			                        Warehouse*</label>
			                    <div class="col-sm-6">
			                        <select name="warehouse" required="" class="form-control">
			                          @foreach($warehouse as $rows)
			                          <option value="{{ $rows->id }}" {{ $rows->id == $edit_product->warehouse ? 'selected' : '' }}>
			                          	{{ $rows->warehouse_name }}</option>
			                            @endforeach 
			                        </select>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_code">
			                        Product Code</label>
			                    <div class="col-sm-6">
			                        <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{$edit_product->product_code}}">
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center" for="product_price">
			                        Product Retail Price*</label>
			                    <div class="col-sm-6">
			                    	<div class="input-group mb-3">
				                       	<div class="input-group-prepend">
										    <span class="input-group-text" id="basic-addon1">$</span>
										</div>
										  <input type="text" class="form-control" name="retail_price" value="{{$edit_product->retail_price}}" placeholder="0.00" required="" aria-describedby="basic-addon1">
									</div>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center">
			                        Product Wholesale Price</label>
			                    <div class="col-sm-6">
			                    	<div class="input-group mb-3">
				                       	<div class="input-group-prepend">
										    <span class="input-group-text" id="basic-addon1">$</span>
										</div>
										  <input type="text" name="wholsale_price" value="{{$edit_product->wholsale_price}}" required="" class="form-control" placeholder="0.00"  aria-describedby="basic-addon1">
									</div>
			                    </div>
			                </div>
			                <hr>
			                <div class="form-group row">
			                    <div class="col-sm-4">
				                    <div class="input-group mb-3">
										<input  type="text" name="tax_rate" value="{{$edit_product->tax_rate}}" class="form-control" placeholder="Default TAX Rate" style="margin-left: 10px;">
									  	<div class="input-group-append">
									    	<span class="input-group-text">%</span>
									  	</div>
									</div>
								</div>
								<div class="col-sm-4">
				                    <div class="input-group mb-3">
										<input  type="text" name="discount_rate" value="{{$edit_product->discount_rate}}" class="form-control" placeholder="Default Discount Rate">
									  	<div class="input-group-append">
									    	<span class="input-group-text" id="basic-addon2">%</span>
									  	</div>
									</div>
								</div>
			                    <div class="col-sm-4">
			                        <small>You can change Discount rate during invoice creation also</small>
			                        <small>You can change Tax rate during invoice creation also</small>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <div class="col-sm-4">
			                        <input type="number" placeholder="Stock Units*" class="form-control margin-bottom" value="{{$edit_product->qty}}" name="qty" style="margin-left: 10px;">
			                    </div>
			                    <div class="col-sm-4">
			                        <input type="number" placeholder="Alert Quantity" class="form-control" name="alert_qty" value="{{$edit_product->alert_qty}}" required>
			                    </div>
			                </div>
			                <hr>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center">
			                        Measurement Unit*</label>
			                    <div class="col-sm-8">
			                        <input type="text" name="unit" class="form-control"  placeholder="Unit" value="{{$edit_product->unit}}">
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center">
			                        BarCode</label>
			                    <div class="col-sm-8">
			                        <input type="text" placeholder="BarCode 12 Numeric Digit 123-1-1234567-1" value="{{$edit_product->barcode}}" class="form-control margin-bottom" name="barcode">
			                        <small>Leave blank if you want auto generated.</small>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center">
			                        Description</label>
			                    <div class="col-sm-8">
			                        <textarea placeholder="Description" class="form-control margin-bottom" name="product_desc" value="{{$edit_product->product_desc}}"></textarea>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center">Employee Comission</label>
			                    <div class="col-sm-8">
			                        <input placeholder="Employee Bonus" class="form-control margin-bottom" name="emp_bonus" value="{{$edit_product->emp_bonus}}" onkeypress="return isNumber(event)">
			                    <pre>Add % sign with value for pencentage bonus or simple value for flat bonus</pre>
			                    </div>
			                </div>
			                <div class="form-group row"> 
			                	<label class="col-sm-3 text-center">Image</label>
			                    <div class="col-sm-8">
			                        <div id="progress" class="progress">
			                            <div class="progress-bar progress-bar-success"></div>
			                        </div>
			                        <!-- The container for the uploaded files -->
			                        <table id="files" class="files"></table>
			                        <br>
			                        <span class="btn btn-success fileinput-button">
			                            <i class="glyphicon glyphicon-plus"></i>
			                            <span>Select files...</span>
			                            <!-- The file input field used as target for the file upload widget -->
			                            <input id="fileupload" type="file" name="image">
			                            <img src="{{URL::asset('public_path/image/'.$edit_product->image) }}" style="width: 90px;height: 60px;">
			                        </span>
			                        <br>
			                        <pre>Allowed: gif, jpeg, png (Use light small weight images for fast loading - 200x200)</pre>
			                        <br>
			                        <!-- The global progress bar -->
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label class="col-sm-3 text-center"></label>
			                    <div class="col-sm-4">
			                        <input type="submit" id="submit-data" class="btn btn-lg btn-light-blue margin-bottom" value="Update product" data-loading-text="Adding...">
			                        <input type="hidden" value="products/addproduct" id="action-url">
			                    </div>
			                </div>
			                <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
			                </div>
			            </div> 
			        </form>
			        @endforeach
   				</div>
			</div>
		</div>
	</div>

@endsection
@section('script')
<script src="{{ asset('/js/inventory/inventory.js') }}"></script>
@endsection