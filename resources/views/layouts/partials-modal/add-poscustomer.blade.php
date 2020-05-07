<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header _modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	        </div>
	      	<form method="post">
	      		<div class="modal-body">
			        <div class="row">
                        <div class="col-sm-12">
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
                                <span class="col-sm-2 col-form-label" for="address"> Group</span>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                    	<option>Default group</option>
                                    </select>
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