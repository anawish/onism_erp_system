@extends('layouts.app')
@section('style')
<style type="text/css">
	.trial_bal{
		height: 100px;
		width: 100%;
		margin-top: 10px;
		background-color: #29bb9c;
		color: white;
	}
	.mt-10{
		margin-top: 10px;
		text-decoration: none;
	}
	#_account a{
		 text-decoration:none;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
		 	<div class="row">
               <div class="col-md-3" id="_account">
					<a href="{{url('account/create')}}">
						<div class="card trial_bal">
							<div class="card-body" id="">
								<h5 class="text-center mt-10">Trial Balance</h5>
							</div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3" id="_account">
					<a href="{{url('account/viewcustomer')}}">
						<div class="card trial_bal">
							<div class="card-body">
								<h5 class="text-center mt-10">Customer Ledger</h5>
							</div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3" id="_account">
					<a href="{{url('/generaledger')}}">
						<div class="card trial_bal">
							<div class="card-body">
								<h5 class="text-center mt-10">General Ledger</h5>
							</div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3" id="_account">
					<a href="{{url('/vendorledger')}}">
						<div class="card trial_bal">
							<div class="card-body">
								<h5 class="text-center mt-10">Vendor Ledger</h5>
							</div>
             			</div>
             		</a>
				</div>
            </div>
            <div class="row">
            	<div class="col-md-3" id="_account">
					<a href="{{url('/generaltransaction')}}">
						<div class="card trial_bal">
							<div class="card-body">
								<h5 class="text-center mt-10">General Transaction</h5>
							</div>
             			</div>
             		</a>
				</div>
				<div class="col-md-3" id="_account">
					<a href="{{url('/viewtransaction')}}">
						<div class="card trial_bal">
							<div class="card-body">
								<h5 class="text-center mt-10">View Transaction</h5>
							</div>
             			</div>
             		</a>
				</div>
            </div>
		</div>
	</div>
</div>
@endsection
