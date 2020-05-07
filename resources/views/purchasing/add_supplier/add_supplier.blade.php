@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
				<div class="col-md-9">
				<div class="card card-block mt-10">
				 	<div class="row">
						<h3 style="margin-top: 20px;margin-left: 30px;">Add New Supplier</h3>
					</div>
					<hr>
		            <form method="post" id="data_form" actioin="PurchaseSupplierController@store">
		            	  {{ csrf_field() }}
		             
		                <div class="modal-body">
	                        <p id="statusMsg"></p>
	                     	<!-- <input type="hidden" name="company_id" id="mcustomer_id" value="0"> -->
		                    <div class="form-group row">
		                        <label class="col-sm-2 col-form-label" for="name">Supplier Name</label>
		                        <div class="col-sm-10">
		                            <input type="text" placeholder="Supplier Name" class="form-control margin-bottom" id="mcustomer_name" name="name" required="">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-sm-2 col-form-label" for="phone">Supplier Phone</label>
		                        <div class="col-sm-10">
		                            <input type="text" placeholder="Supplier Phone" class="form-control margin-bottom" name="phone" id="mcustomer_phone">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-sm-2 col-form-label" for="email">Supplier Email</label>
		                        <div class="col-sm-10">
		                            <input type="email" placeholder="Email" class="form-control margin-bottom crequired" name="email" id="mcustomer_email">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-sm-2 col-form-label" for="address">Supplier Address</label>
		                        <div class="col-sm-10">
		                            <input type="text" placeholder="Address" class="form-control margin-bottom " name="address" id="address">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <div class="col-sm-4">
		                            <input type="text" placeholder="City" class="form-control margin-bottom" name="city" id="mcustomer_city">
		                        </div>
		                        <div class="col-sm-4">
		                            <input type="text" placeholder="Region" class="form-control margin-bottom" name="region">
		                        </div>
		                          <div class="col-sm-4">
		                            <input type="text" placeholder="Country" class="form-control margin-bottom" name="country" id="mcustomer_country">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <div class="col-sm-6">
		                            <input type="text" placeholder="PostBox" class="form-control margin-bottom" name="postbox">
		                        </div>
		                            <div class="col-sm-6">
		                            <input type="text" placeholder="TAX ID" class="form-control margin-bottom" name="taxid" id="tax_id">
		                        </div>
		                    </div>
                		</div>
		                <div class="form-group row">
		                    <label class="col-sm-2 col-form-label"></label>
		                    <div class="col-sm-8">
		                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom" value="Add Supplier" style="margin-left: 265px;" data-loading-text="Adding...">
		                        <input type="hidden" value="productcategory/addcat" id="action-url">
		                    </div>
		                </div>
		            </form>
		        </div>
			</div>
		</div>
	</div>
@endsection
