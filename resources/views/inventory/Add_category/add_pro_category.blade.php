@extends('layouts.app')
@section('style')
<style type="text/css">
		
	.text-center:after {
	  content:" *";
	  color: red;
	}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="card card-block">
				 	<div class="row">
						<h3 style="margin-top: 20px;margin-left: 30px;">Add New Category</h3>
					</div>
					<hr>
		            <form method="post" id="data_form" actioin="Add_product_categoryController@store">
		            	  {{ csrf_field() }}
		             
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center product_catname" for="product_catname">Category Name</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Category Name" class="form-control margin-bottom" required name="category_name">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="product_catname">Description</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Category Short Description" class="form-control margin-bottom" required name="category_desc">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="product_catname">Sub Category</label>
		                    <div class="col-sm-8">
		                        <input type="text" name="sub_category[]" class="form-control margin-bottom" required placeholder="Subcategory">
		                    </div>
		                </div>
		                <div class="form-group row" id="subCategory">
		                   <label class="col-sm-2 col-form-label text-center" for="product_catname">Bussines Location</label>
		                    <div class="col-sm-8">
		                        <input type="text" name="bussines_loc" class="form-control margin-bottom" placeholder="Bussines Location">
		                    </div>
		                </div>
		                <div class="form-group row">
		                   <label class="col-sm-2 col-form-label text-center" for="product_catname"></label>
		                    <div class="col-sm-8">
		                    <input type="button" class="btn btn-info btn-sm"id="sub_category" value="+ Add Sub Category"> 
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label"></label>
		                    <div class="col-sm-8">
		                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom" value="Add Category" data-loading-text="Adding...">
		                        <input type="hidden" value="productcategory/addcat" id="action-url">
		                    </div>
		                </div>
		            </form>
		        </div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/inventory/category.js')}}"></script>
@endsection