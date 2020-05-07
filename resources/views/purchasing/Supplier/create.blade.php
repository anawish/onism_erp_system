@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-12">
						<h4>Add New supplier Details</h4>
						@if (session('status'))
					        <div class="alert alert-success">
					        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
					        </div>
					    @endif
					</div>
				</div>
				<hr>
				<form method="POST" action="{{action('SupplierController@store')}}">
					@csrf
					<div class="form-group row">
					    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Name" name="name" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputCompany" class="col-sm-2 col-form-label">Company</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Company" name="company" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Phone" name="phone" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Address" name="address" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="City" name="city" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputRegion" class="col-sm-2 col-form-label">Region</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Region" name="region">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="Country" name="country" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPostBox" class="col-sm-2 col-form-label">PostBox</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="PostBox" name="postbox">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputCompany" class="col-sm-2 col-form-label">TAX ID</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control form-control-sm" placeholder="TAX" name="taxid">
					    </div>
					</div>
					<div class="form-group row">
					    <label class="col-sm-2 col-form-label"></label>
					    <div class="col-sm-6">
					      <input type="submit" class="btn btn-success" value="Add" style="padding: 5px 50px;">
					    </div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection