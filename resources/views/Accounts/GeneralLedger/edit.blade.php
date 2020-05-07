@extends('layouts.app')
@section('style')
<style type="text/css">
	.mt-15{
		margin-top: 15px;
	}
	.mb-20{
		margin-bottom: 20px;
	}
	.mt-25{
		margin-top: 25px;
	}
	.required:after {
	    content:" *";
	    color: red;
	  }
	label{
	    color: #312f2f;
	}
	h4{
		margin-left: 60px;
	}

</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-15">
			@foreach($accountDetail as $accountDetails)
			<form method="POST" action="{{action('GeneralLedgerController@update',$accountDetails->id)}}">
		        {{ csrf_field() }}
		         @method('PUT')
		        <div class="card">
		          	<div class="row mt-25">
			          	<div class="col-md-12">
			          		<h4>Account Details</h4>
			          		<hr>
			          	</div>
			          	
			          	<input type="hidden" name="id" value="{{$accountDetails->id}}">
			            <div class="col-md-12">
			              	<div class="form-group">
				              	<div class="row">
				              		<div class="col-sm-2">
				              			<label class="required" style="margin-left: 45px;">GL NO</label>
				              		</div>
				              		<div class="col-sm-6">
				              			<input type="text" class="form-control form-control-sm" id="gl_no" placeholder="Enter GL No" maxlength="7" minlength="7" name="gl_no" value="{{$accountDetails->gl_no}}">
				                		<span id="errmsg"></span>
				              		</div>
				              	</div>
			             	</div>
			            </div>
			            <div class="col-md-12">
			              <div class="form-group">
			              	<div class="row">
			              		<div class="col-sm-2">
			              			<label class="required" style="margin-left: 20px;">Account Name</label>
			              		</div>
			              		<div class="col-sm-6">
			              			<input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Account Name" value="{{$accountDetails->name}}">
			              		</div>
			              	</div>
			              </div>
			            </div>
			            <div class="col-md-12">
			              <div class="form-group">
			              	<div class="row">
			              		<div class="col-sm-2">
			              			<label style="margin-left: 29px;">Description</label>
			              		</div>
			              		<div class="col-sm-6">
			              			<input type="text" name="description" class="form-control form-control-sm" placeholder="Enter Description" value="{{$accountDetails->description}}">
			              		</div>
			              	</div>
			              </div>
			            </div>
			            <div class="col-md-12">
			              <div class="form-group">
			              	<div class="row">
			              		<div class="col-sm-2">
			              			<label class="required" style="margin-left: 20px;">Account Type</label>
			              		</div>
			              		<div class="col-sm-6">
					                <select class="form-control form-control-sm" name="account_type">
					                  <option value="1">Balance Sheet</option>
					                  <option value="2">Profit & Loss </option>
					                </select>
			              		</div>
			              	</div>     
			              </div>
			            </div>
			            <div class="col-md-12" id="closing_bln">
			              <div class="form-group">
			              	<div class="row">
			              		<div class="col-sm-2">
			              			<label style="margin-left: 10px;">Opening Balance</label>
			              		</div>
			              		<div class="col-sm-6">
			                		<input type="text" name="opening_bla" class="form-control form-control-sm" placeholder="Opening Balance" value="{{$accountDetails->closing_bla}}">
			              		</div>
			              	</div>
			              </div>
			            </div>
			            @endforeach
			            <div class="col-md-12">
			            	<div class="row">
			            		<div class="col-sm-2"></div>
			            		<div class="col-sm-6">
			            			<button type="submit" class="btn btn-primary mb-20" >Update Account</button>
			            		</div>
			            	</div>
			            </div>
		          	</div>
		        </div>
	      	</form>
		</div>
	</div>
</div>
@endsection