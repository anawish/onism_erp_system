@extends('layouts.app')

@section('style')
<style type="text/css">
	.heading{
		margin-top: 20px;
	}
	label{
		font-weight: 800;
	}
	input{
		font-weight: 700;
	}
	.Total_amount{
		font-weight: bold;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="heading">
				<h6>Account Receiveable Detail</h6>
			</div>
			<hr>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label>Customer Name:</label>
					</div>
					@foreach($customer as $customers)
					<div class="col-sm-2">
						<input type="hidden" name="customer_id" value="{{$customers->id}}" id="customer_id">
						<input type="text" name="Customer_name" class="form-control-plaintext form-control-sm plain-text" value="{{$customers->name}}">
					</div>
					@endforeach
					<div class="col-sm-2">
						<label>Account No:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="account_no" class="form-control-plaintext form-control-sm" value="{{$customers->cust_no}}">
					</div>
					<div class="col-md-2">
						<label>Opening Balance:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="closing_balance" id="closing_balance" class="form-control-plaintext form-control-sm" value="{{number_format($balance,2)}}">
					</div>
				</div>
			</div>
			
			<hr>
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-4">
					<label>From Date</label>
					<input type="date" name="From" id="From" class="form-control" placeholder="From Date"/>
				</div>
				<div class="col-md-4">
					<label>To Date</label>
					<input type="date" name="to" id="to" class="form-control" placeholder="To Date"/>
				</div>
				<div class="col-md-4">
					<input type="button" name="range" id="range" value="Run" class="btn btn-success"/ style="margin-top: 32px;">
					@foreach($customer as $customers)
					<a href="{{url('viewbalance',$customers->id)}}" name="range" id="refresh" value="Refresh" class="btn btn-info" style="margin-top: 32px;" /> Refresh
					</a>
					@endforeach
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
					@foreach($invoice as $invoices)
					<tr>
						<td>{{$cust_no}}</td>
						<td>{{$invoices->type}}</td>
						<td>{{$invoices->invoice_no}}</td>
						<td>{{$invoices->updated_date}}</td>
						<td>{{$invoices->payment_note}}</td>
						@if($invoices->debit == 0)
						<td></td>
						@else
						<td>{{number_format($invoices->debit,2)}}</td>
						@endif
						@if($invoices->payment == 0)
						<td></td>
						@else
						<td>{{number_format($invoices->payment,2)}} </td>
						@endif
						<td>{{number_format($invoices->closing_balance,2)}}</td>
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
						<td id="TotalCredit" class="Total_amount">{{number_format($TotalCredit,2)}}</td>
						<td id="closing_bla" class="Total_amount">{{number_format($Closing_bla,2)}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/generaledger.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
@endsection