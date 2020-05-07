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
			 	<h4 class="modal-title" id="exampleModalLabel" style="margin-left: 25px;">Edit Customer Detail</h4>
		      	<div class="modal-header">
		      		@foreach($data as $datas)
			      	<form method="POST" action="{{action('ClientController@update',$datas->id)}}">
		                {{ csrf_field() }}
		                @method('PUT')
			      		<div class="modal-body">

			      			@foreach($company_id as $companies)
		                        <input type="hidden" name="company_id" value="{{$companies->company_id}}">
		                    @endforeach
		                    
			      			<div class="row">
		                        <div class="col-sm-6">
		                            <h5>Billing Address</h5>
		                            <hr>
		                            <div class="form-group row">
		                            	<input type="hidden" name="company_id">
		                                <span class="col-sm-2 col-form-label">Name</span>
		                                <div class="col-sm-10">
		                                    <input type="text"class="form-control form-control-sm margin-bottom" id="mcustomer_name" name="name" required="" value="{{$datas->name}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="phone"> Phone</span>
		                                <div class="col-sm-10">
		                                    <input type="text" class="form-control form-control-sm margin-bottom" name="phone" id="mcustomer_phone" value="{{$datas->phone}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="email"> Email</span>
		                                <div class="col-sm-10">
		                                    <input type="email" placeholder="Email" class="form-control form-control-sm margin-bottom crequired" name="email" id="mcustomer_email" required="" value="{{$datas->email}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="address"> Address</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Address" class="form-control form-control-sm margin-bottom " name="address" id="mcustomer_address1" value="{{$datas->address}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="city"> City</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="City" class="form-control form-control-sm margin-bottom" name="city" id="mcustomer_city" value="{{$datas->city}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="region"> Region</span>
		                                <div class="col-sm-10">
		                                     <input type="text" placeholder="Region" id="region" class="form-control form-control-sm margin-bottom" name="region" value="{{$datas->region}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="country"> Country</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Country" class="form-control form-control-sm margin-bottom" name="country" id="mcustomer_country" value="{{$datas->country}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="postbox"> PostBox</span>
		                                <div class="col-sm-10">
		                                     <input type="text" placeholder="PostBox" id="postbox" class="form-control form-control-sm margin-bottom" name="postbox" value="{{$datas->postbox}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="postbox"> Company</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Company" class="form-control form-control-sm margin-bottom" name="company" value="{{$datas->company}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="customergroup"> Group</span>
		                                <div class="col-sm-10">
		                                    <select name="customergroup" class="form-control">
		                                    	@foreach($cust_group as $cust_groups)
		                                    		<option value="{{$cust_groups->id}}" {{$cust_groups->id == $datas->gid ? 'selected' : ''}}> {{$cust_groups->title}}</option>
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
		                            <hr>
		                            <div class="form-group row">
		                                <div class="col-sm-10">
		                                    Please leave Shipping Address blank if you do not want to print it on the invoice.                                
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="name_s">Name</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Name" class="form-control form-control-sm margin-bottom" id="mcustomer_name_s" name="name_s" value="{{$datas->name_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="phone_s"> Phone</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Phone" class="form-control form-control-sm margin-bottom" name="phone_s" id="mcustomer_phone_s" value="{{$datas->phone_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="email_s"> Email</span>
		                                <div class="col-sm-10">
		                                    <input type="email" placeholder="Email" class="form-control form-control-sm margin-bottom" name="email_s" id="mcustomer_email_s" value="{{$datas->email_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="address_s"> Address</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Address" class="form-control form-control-sm margin-bottom " name="address_s" id="mcustomer_address1_s" value="{{$datas->address_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="city_s"> City</span>
		                                <div class="col-sm-10">
		                                   <input type="text" placeholder="City" class="form-control form-control-sm margin-bottom" name="city_s" id="mcustomer_city_s" value="{{$datas->city_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="region_s"> Region</span>
		                                <div class="col-sm-10">
		                                   <input type="text" placeholder="Region" id="region_s" class="form-control form-control-sm margin-bottom" name="region_s" value="{{$datas->region_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="country_s"> Country</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="Country" class="form-control form-control-sm margin-bottom" name="country_s" id="mcustomer_country_s" value="{{$datas->country_s}}">
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <span class="col-sm-2 col-form-label" for="postbox"> PostBox</span>
		                                <div class="col-sm-10">
		                                    <input type="text" placeholder="PostBox" id="postbox_s" class="form-control margin-bottom" name="postbox_s" value="{{$datas->postbox_s}}">
		                                </div>
		                            </div>
		                        </div>
							</div>
							@endforeach
			      		</div>
				      	<div class="modal-footer">
				        	<input type="submit" class="btn btn-primary" value="Update Client">
				      	</div>
				    </form>
	   			</div>
			</div>
		</div>
	</div>
</div>
@endsection