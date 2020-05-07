@extends('layouts.app')
@section('style')
<style type="text/css">
	
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="modal-content">
			 	<h4 class="modal-title" id="exampleModalLabel" style="margin-left: 25px; margin-top: 10px;">Edit Supplier Details</h4>
			 	@foreach($data as $datas)
		      	<form method="POST" action="{{action('SupplierController@update',$datas->id)}}">
		      		@csrf
		      		@method('PUT')
		      		<hr>
					<div class="form-group row">
					    <label for="staticEmail" class="col-sm-2 col-form-label text-center">Name</label>
					    <div class="col-sm-7">
					      <input type="text" name="name" class="form-control form-control-sm" value="{{$datas->name}}" placeholder="Name">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputCompany" class="col-sm-2 col-form-label text-center">Company</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control form-control-sm" placeholder="Company" name="company" value="{{$datas->company}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Phone</label>
					    <div class="col-sm-7">
					      <input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone" value="{{$datas->phone}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Address</label>
					    <div class="col-sm-7">
					      <input type="text" name="address" class="form-control form-control-sm" placeholder="address" value="{{$datas->address}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Email</label>
					    <div class="col-sm-7">
					      <input type="text" name="email" class="form-control form-control-sm" placeholder="email" value="{{$datas->email}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">City</label>
					    <div class="col-sm-7">
					      <input type="text" name="city" class="form-control form-control-sm" placeholder="City" value="{{$datas->city}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Region</label>
					    <div class="col-sm-7">
					      <input type="text" name="region" class="form-control form-control-sm" placeholder="Region" value="{{$datas->region}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Country</label>
					    <div class="col-sm-7">
					      <input type="text" name="country" class="form-control form-control-sm" placeholder="Country" value="{{$datas->country}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">PostBox</label>
					    <div class="col-sm-7">
					      <input type="text" name="postbox" class="form-control form-control-sm" placeholder="PostBox" value="{{$datas->postbox}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center">Tax ID</label>
					    <div class="col-sm-7">
					      <input type="text" name="taxid" class="form-control form-control-sm" placeholder="TAX ID" value="{{$datas->taxid}}">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 col-form-label text-center"></label>
					    <div class="col-sm-7">
					      <input type="submit" class=" btn btn-primary btn-sm" placeholder="TAX ID" value="Update Supplier">
					    </div>
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection