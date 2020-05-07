@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')

			<div class="col-md-9">
				<div class="card card-block">
				 	<div class="row">
						<h3 style="margin-top: 20px;margin-left: 30px;">Add New Warehouse</h3>
					</div>
					<hr>
		            <form method="post" id="data_form" actioin="WarehouseController@store">
		            	  {{ csrf_field() }}
		            	  
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="warehouse_name">Warehouse Name</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Warehouse Name" class="form-control margin-bottom" required="" name="warehouse_name">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="warehouse_desc">Description</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Warehouse Short Description" class="form-control margin-bottom" required="" name="warehouse_desc">
		                    </div>
		                </div>
		                <!-- <input type="hidden" name="company_id" value="1"> -->
		                <div class="form-group row subcategory">
		                   <label class="col-sm-2 col-form-label text-center" for="product_catname">Bussines Location</label>
		                    <div class="col-sm-8">
		                        <input type="text" name="bussines_loc" required="" class="form-control margin-bottom" placeholder="Bussines Location">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label"></label>
		                    <div class="col-sm-8">
		                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom" value="Add Warehouse" data-loading-text="Adding...">
		                        <input type="hidden" value="productcategory/addcat" id="action-url">
		                    </div>
		                </div>
		            
		            </form>
		        </div>
			</div>
		</div>
	</div>
@endsection