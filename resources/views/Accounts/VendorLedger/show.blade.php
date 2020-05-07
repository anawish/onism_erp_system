@extends('layouts.app')
@section('style')
<style type="text/css">
	.mt-20{
		margin-top: 20px;
	}
	label{
		font-weight: 700;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-20">
			<h5>Account Detail</h5>
			<hr>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label>Vendor Name:</label>
					</div>
					@foreach($vendor as $vendors)
					<div class="col-sm-2">
						<input type="hidden" name="vendor_id" value="{{$vendors->id}}" id="vendor_id">
						<input type="text" name="Customer_name" class="form-control-plaintext form-control-sm plain-text" value="{{$vendors->name}}">
					</div>
					@endforeach
					<div class="col-sm-2">
						<label>Account No:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="account_no" class="form-control-plaintext form-control-sm">
					</div>
					<div class="col-md-2">
						<label>Opening Balance:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="closing_balance" id="closing_balance" class="form-control-plaintext form-control-sm" value="{{number_format($Closing_bla,2) }}">
					</div>
				</div>
			</div>
			<hr>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From Date</label>
					<input type="date" name="From" id="From" class="form-control form-control-sm" placeholder="From Date"/>
				</div>
				<div class="col-md-4">
					<label>To Date</label>
					<input type="date" name="to" id="to" class="form-control form-control-sm" placeholder="To Date"/>
				</div>
				<div class="col-md-4">
					<input type="button" name="range" id="range" value="Run" class="btn btn-success btn-sm" style="margin-top: 32px;">
					<a href="" name="range" id="refresh" value="Refresh" class="btn btn-info btn-sm" style="margin-top: 32px;"/> Refresh
					</a>
				</div>
			</div>
			<table id="MasterTable" class="table table-bordered">
				<thead style="font-size: 14px;">
					<tr>
						<th>Trans ID</th>
						<th>Type</th>
						<th>Invoice No</th>
						<th>Date</th>
						<th>Description</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Closing Balance</th>
					</tr>
				</thead>
				<tbody>
					@foreach($po_order as $po_orders)
					<tr>
						<td>{{$po_orders->id}}</td>
						<td>{{$po_orders->type}}</td>
						<td>{{$po_orders->po_no}}</td>
						<td>{{$po_orders->updated_date}}</td>
						<td>{{$po_orders->payment_note}}</td>
						<td>{{number_format($po_orders->payment,2)}}</td>
						<td></td>
						<td>{{number_format($po_orders->closing_balance,2)}}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td  class="Total_amount">Total</td>
						<td id="Total_Debit"class="Total_amount">{{number_format($TotalDebit,2)}}</td>
						<td id="TotalCredit" class="Total_amount"></td>
						<td id="closing_bla" class="Total_amount">{{number_format($Closing_bla,2)}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection