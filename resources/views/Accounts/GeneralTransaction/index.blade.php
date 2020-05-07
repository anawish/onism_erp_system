@extends('layouts.app')
@section('style')
<style type="text/css">
	.theader{
		background-color: #29bb9c;
	}
	table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
	._post{
		float: right;
		margin-left: 20px;
		background-color: #25b294;
		border: none;
		padding: 7px 40px;
		font-size: 16px;
		font-family: sans-serif;
	}
	._post:hover{
		background-color: #25b294;
	}
	.invoice_det {
		float:right;font-family:sans-serif; margin-top: 10px;
	}
	.sub_total{
		width: 83%;
		margin-left: 93px;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<form method="POST" action="{{action('GeneralTransactionController@store')}}">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						@if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif
					</div>
				</div>
				<!-------DOC DETAIL-------->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group mt-20">
							<label>Transaction Type</label>
							<div class="input-group">
								<select class="form-control form-control-sm" id="trans_type" name="trans_type" required>
									<option></option>
									<option value="CR">CR</option>
									<option value="CP">CP</option>
									<option value="BR">BR</option>
									<option value="BP">BP</option>
									<option value="GR">GR</option>
									<option value="RE">RE</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group mt-20" id="current_Date">
							<label>DOC Date</label>
							<div class="input-group">
								<input type="text" name="doc_date" id="doc_date" class="form-control form-control-sm" required>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group mt-20" id="due_date">
							<label>Posting Date</label>
							<div class="input-group">
								<input type="text" name="posting_date" id="posting_date" class="form-control form-control-sm">
							</div>
						</div>
					</div>
				</div>

				<div class="row" >
					<div class="col-md-4 d-none">
						<div class="form-group mt-20">
							<label>DOC No.</label>
							<div class="input-group">
								<input type="hidden" name="doc_no" class="form-control-sm form-control" readonly="" value="{{$doc_no}}">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group mt-20">
							<label>Net Balance</label>
							<div class="input-group">
								<input type="text" name="net_balance" id="net_balance" 
									class="form-control form-control-sm" required>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group mt-20 cheq_no_detail" id="cheq_no_detail"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label> Narration </label>
							<textarea rows="2" class="form-control form-control-sm" id="description" name="description"></textarea>
						</div>
					</div>
				</div>
				<!-------/DOC DETAIL-------->

				<!------ GL DETAIL---------->
				<table id="myTable" class="table order-list">
					    <thead class="theader">
					        <tr>
					          	<th>#</th>
								<th>GL No.</th>
								<th>Name</th>
								<th>Description</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Action</th>
					        </tr>
					    </thead>
					    <tbody id="gl_detail">
					    	<tr class="autonumber">
					    		<td></td>
					    		<td>
					    			<div class="input-group">
					    				<input type="hidden" name="gl_id[]" id="gl_id">
					            		<input type="text" name="gl_no[]" id="gl_no" class="form-control form-control-sm" required>
					                	<div class="input-group-prepend">
					                		<div class="input-group-text">
					                			<i class="fa fa-search-plus searchbtn" data-toggle="modal" data-target="#accountsearch" onclick="searchbtn(this)"></i>
					                		</div>
					                	</div>
					            	</div>
					    		</td>
					    		<td>
					    			<input type="text" name="gl_name[]" id="gl_name" class="form-control form-control-sm" readonly>
					    		</td>
					    		<td>
					    			<input type="text" name="gl_des[]" id="gl_des" class="form-control form-control-sm" readonly>
					    		</td>
					    		<td>
					    			<input type="text" name="debit[]" id="debit" class="form-control form-control-sm debit" onchange="cal_debit_credit(this)" value="0.00">
					    		</td>
					    		<td>
					    			<input type="text" name="credit[]" id="credit" class="form-control form-control-sm" onchange="cal_debit_credit(this)" value="0.00">
					    		</td>
					    		<td>
					    			<input type="button" class="delete_row btn btn-sm btn-danger" value="X">
					    		</td>
					    	</tr>
					    </tbody>
    					<tfoot>
					        <tr>
					            <td>
					                <input type="button" class="btn btn-success" id="addrow" value=" + Add Row"/>
					            </td>
					        </tr>
					        <tr>
					        	<td></td>
					        	<td></td>
					        	<td></td>
					        	<td><label style="font-weight: 700">Net Total</label></td>
					        	<td><input type="text" name="total_debit" id="total_debit" class="form-control-sm form-control" readonly></td>
					        	<td><input type="text" name="total_credit" id="total_credit" class="form-control-sm form-control" readonly></td>
					        	<td></td>
					        </tr>
    					</tfoot>
					</table>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" name="post_transaction" class="btn btn-success btn-md _post" value="Post Transaction">
							<input type="preview" id="pre_view" class="btn btn-success btn-md" data-toggle="modal" data-target="#account_preview" value="Preview" style="float: right;">
						</div>
					</div>
				<!------ /GL DETAIL -------->
			</form>
		</div>
	</div>
</div>
@include('layouts.partials-modal.accountdetail')
@include('layouts.partials-modal.account_preview')
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/generalTransaction.js')}}"></script>
@endsection

@endsection