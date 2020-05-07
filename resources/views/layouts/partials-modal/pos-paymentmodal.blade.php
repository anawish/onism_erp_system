<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content w-600">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		       		<div class="col-md-8">
		       			<label>Amount</label>
		       			<div class="input-group">
					        <input type="text" class="form-control" placeholder="Amount">
					        <div class="input-group-prepend rounded-pill">
					           <span class="input-group-text" id="inputGroupPrepend">@</span>
					        </div>
					    </div>
		       		</div>
		       		<div class="col-md-4">
				    	<div class="form-group">
				    		<label>Payment Method</label>
				    		<select class="form-control">
				    			<option>Cash</option>
				    			<option>Bank</option>
				    		</select>	
				    	</div>
					</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Change</label>
		        			<input type="text" name="change" class="form-control" placeholder="0">
		        		</div>
		        	</div>
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Sales Person</label>
		        			<select class="form-control">
		        				<option>Bussines Owner</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		    </div>
		    <div class="modal-footer">
		    	<button type="submit" class="btn btn-info font-weight-bold w-100">Paynow</button>
		    </div>
	    </div>
	</div>
</div>