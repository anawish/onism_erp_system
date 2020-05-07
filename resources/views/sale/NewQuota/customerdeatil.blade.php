@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				 <div class="modal-content" style="margin-top: 10px;">
			      	<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
			      	</div>
			      	<form method="POST" action="{{action('NewQoutaController@store') }}">
		                 @csrf
			      		<div class="modal-body">
			      			<div class="row">
		                        <div class="col-sm-6">
		                            <h5>Billing Address</h5>
		                            <div class="form-group row">
		                            	@foreach($company_id as $companies)
		                            	<input type="hidden" name="company_id" value="{{$companies->company_id}}">
		                            	@endforeach
		                                <span class="col-sm-2 col-form-label">Name</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Name" class="form-control margin-bottom" id="mcustomer_name" name="name" required="">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="phone"> Phone</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Phone" class="form-control margin-bottom" name="phone" id="mcustomer_phone">
		                                </div>
		                            </div>
		                            <input type="hidden" name="cust_no" value="{{$customer_no}}">
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="email"> Email</span>
		                                <div class="col-sm-10">
		                                    <input type="email" placeholder="Email" class="form-control margin-bottom crequired" name="email" id="mcustomer_email" required="">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="address"> Address</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Address" class="form-control margin-bottom " name="address" id="mcustomer_address1">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="City" class="form-control margin-bottom" name="city" id="mcustomer_city">
		                                </div>
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="Region" id="region" class="form-control margin-bottom" name="region">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="Country" class="form-control margin-bottom" name="country" id="mcustomer_country">
		                                </div>
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="PostBox" id="postbox" class="form-control margin-bottom" name="postbox">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="Company" class="form-control margin-bottom" name="company">
		                                </div>
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="TAX ID" class="form-control margin-bottom" name="taxid" id="mcustomer_city">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="customergroup"> Group</span>
		                                <div class="col-sm-10">
		                                    <select name="customergroup" class="form-control">
		                                    	@foreach($cust_group as $customer_group)
		                                    		<option value="{{$customer_group->id}}">{{$customer_group->title}}</option>
		                                    	@endforeach
		                                    </select>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="customerroute">Customer Route</span>
		                                <div class="col-sm-10">
		                                    <select name="customerroute" class="form-control">
		                                    	@foreach($cust_route as $customer_route)
		                                        	<option value="{{$customer_route->id}}">{{$customer_route->title}}</option>
		                                        @endforeach                                   
		                                    </select>
		                                </div>
		                            </div>
		                        </div>
		                        <!-- shipping -->
		                        <div class="col-sm-6">
		                            <h5>Shipping Address</h5>
		                            <div class="form-group row">
		                                <div class="col-sm-10">
		                                    Please leave Shipping Address blank if you do not want to print it on the invoice.                                
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="name_s">Name</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Name" class="form-control margin-bottom" id="mcustomer_name_s" name="name_s">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="phone_s"> Phone</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Phone" class="form-control margin-bottom" name="phone_s" id="mcustomer_phone_s">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="email_s"> Email</span>
		                                <div class="col-sm-10">
		                                    <input type="email" placeholder="Email" class="form-control margin-bottom" name="email_s" id="mcustomer_email_s">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="address_s"> Address</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Address" class="form-control margin-bottom " name="address_s" id="mcustomer_address1_s">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="City" class="form-control margin-bottom" name="city_s" id="mcustomer_city_s">
		                                </div>
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="Region" id="region_s" class="form-control margin-bottom" name="region_s">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="Country" class="form-control margin-bottom" name="country_s" id="mcustomer_country_s">
		                                </div>
		                                <div class="col-sm-6">
		                                    <input type="text" placeholder="PostBox" id="postbox_s" class="form-control margin-bottom" name="postbox_s">
		                                </div>
		                            </div>
		                        </div>
							</div>
			      		</div>
				      	<div class="modal-footer">
				        	<input type="submit" class="btn btn-primary" value="Add Client">
				      	</div>
				    </form>
	   			</div>
			</div>
		</div>
	</div>
@endsection