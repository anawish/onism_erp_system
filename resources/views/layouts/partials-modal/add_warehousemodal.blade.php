<div class="modal fade" id="addwarehouse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-left: 318px;">
	    <div class="modal-content" style="width: 700px;">
		    <div class="modal-header" style="background-color: #29bb9c;color: white;">
		        <h5 class="modal-title" id="exampleModalLabel">Add New Warehouse</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <div class="modal-body">
		        <div class="card card-block" style="border: none;">
		            <form method="post" id="data_form" class="form-horizontal">
		                <div class="form-group row">
		                    <label class="col-sm-3 col-form-label" for="product_catname">Warehouse Name</label>

		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Warehouse Name" class="form-control margin-bottom  required" name="warehouse_name">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-3 col-form-label" for="product_catname">Description</label>
		                    <div class="col-sm-8">
		                        <input type="text" placeholder="Warehouse Short Description" class="form-control margin-bottom required" name="warehouse_desc">
		                    </div>
		                </div>
		                <div class="form-group row subcategory">
		                    <div class="col-sm-3">Bussines Location</div>
		                    <div class="col-sm-8">
		                        <input type="text" name="bussines_loc" class="form-control" placeholder="Enter Bussines Location">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label class="col-sm-3 col-form-label"></label>
		                    <div class="col-sm-8">
		                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom" value="Add Warehouse" data-loading-text="Adding...">
		                        <input type="hidden" value="productcategory/addcat" id="action-url">
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
	    </div>
	</div>
</div>