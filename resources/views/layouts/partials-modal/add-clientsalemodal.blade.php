<div class="modal fade" id="add-client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-left: 37px;">
	    <div class="modal-content" style="width: 1280px;">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<form method="POST" action="{{url('/store')}}">
                 @csrf
	      		<div class="modal-body">
	      			<div class="row">
                        <div class="col-sm-6">
                            <h5>Billing Address</h5>
                            <div class="form-group row">
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
                            <div class="form-group row">
                                <span class="col-sm-2 col-form-label" for="email"> Email</span>
                                <div class="col-sm-10">
                                    <input type="email" placeholder="Email" class="form-control margin-bottom crequired" name="email" id="mcustomer_email">
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
                                        <option value="1">Default Group</option></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-sm-2 col-form-label" for="customerroute">Customer Route</span>
                                <div class="col-sm-10">
                                    <select name="customerroute" class="form-control">
                                        <option value="1">Default Routes</option>                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- shipping -->
                        <div class="col-sm-6">
                            <h5>Shipping Address</h5>
                            <div class="form-group row">
                                <div class="input-group">
                                    <span class="display-inline-block custom-control custom-radio ml-1">
                                       <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Same As Billing</span>
                                    </span>
                                </div>
                                <div class="col-sm-10">
                                    Please leave Shipping Address blank if you do not want to print it on the invoice.                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-sm-2 col-form-label" for="name_s">Name</span>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Name" class="form-control margin-bottom" id="mcustomer_name_s" name="name_s" required="">
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
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="button" class="btn btn-primary">Add</button>
		      	</div>
		    </form>
	    </div>
	</div>
</div>