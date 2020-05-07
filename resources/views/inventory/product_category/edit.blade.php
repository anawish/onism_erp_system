@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="card card-block">
				 	<div class="row">
						<h3 style="margin-top: 20px;margin-left: 30px;">Edit Category</h3>
					</div>
					<hr>
					 @foreach($edit_product as $rows)
		            <form method="post" id="data_form" action="{{route('productcategory.update',$rows->id )}}">
		            	{{ csrf_field() }}
		            	 @method('PUT')
		              	
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="product_catname">Category Name</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Category Name" class="form-control" required="" name="category_name" value="{{$rows->category_name}}">
		                    </div>
		                </div>
		                <input type="hidden" name="company_id" value="1">
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label text-center" for="product_catname">Description</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Product Category Short Description" class="form-control" required="" name="category_desc" value="{{$rows->category_desc}}">
		                    </div>
		                </div>
		               
		                <div class="form-group row subcategory">
		                   <label class="col-sm-2 col-form-label text-center" for="product_catname">Bussines Location</label>
		                    <div class="col-sm-8">
		                        <input type="text" name="bussines_loc" class="form-control" placeholder="Bussines Location" value="{{$rows->bussines_loc}}">
		                        
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label"></label>
		                    <div class="col-sm-8">
		                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom" value="Update Category" data-loading-text="Adding...">
		                        <input type="hidden" value="productcategory/addcat" id="action-url">
		                    </div>
		                </div>
		               
		            </form>
		             @endforeach
		        </div>
			</div>
		</div>
	</div>
@endsection