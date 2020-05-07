@extends('layouts.app')
@section('style')
<style type="text/css">
	.mt-15{
		margin-top: 15px;
	}
	.create_acc{
		margin-bottom: 10px;
	}
	.basic-addon1{
		height: 31px;
	}
	label{
		font-weight: 700
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9 mt-15">
			@if(session()->has('success'))
			    <div class="alert alert-success" id="alert-box">
			        {{ session()->get('success') }}
			    </div>
			@endif
			<a href="" data-toggle="modal" data-target="#create_account" class="btn btn-primary btn-sm create_acc">Create Account</a>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<label>From Date</label>
					<div class="input-group">
			            <input type="date" name="form_date" id="form_date" class="form-control form-control-sm">
			            <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
			        </div>
				</div>
				<div class="col-md-4">
					<label>To Date</label>
					<div class="input-group">
			            <input type="date" name="to_date" id="to_date" class="form-control form-control-sm">
			            <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
			        </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
			            <button class="btn btn-primary btn-sm" id="range" style="margin-top: 31px;">Run</button>
			            <a href="" class="btn btn-info btn-sm"  style="margin-top: 31px;">Refresh</a>
			        </div>
				</div>
			</div>
			@include('layouts.partials-modal.account_modal')
			<table id="MasterTable" class="table table-bordered">
				<thead>
					<tr>
						<th>GL No</th>
						<th>Name</th>
						<th>Opening Balance</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
						<th>Setting</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$total_deb = 0;
						$total_cr = 0;
						$total_balance = 0;
					?>
					@foreach($Trial_bla as $datas)
					<tr>
						<td>{{$datas->gl_no}}</td>
						<td>{{$datas->name}}</td>
						<td></td>
						<?php 
						
						if($datas->name =='Cash'){
							$total_deb = $total_deb + $datas->Debit_val;
							$total_cr = $total_cr+$datas->po_payment;
							$total_balance = $total_balance+$datas->closing_balance;
							?>
							<td>{{number_format($datas->Debit_val,2)}}</td>
							<td>{{number_format($datas->po_payment,2)}}</td>
							<td>{{number_format($datas->closing_balance,2)}}</td>
							<?php
						}
						else{
							if($datas->name =='Sales'){
								$total_cr = $total_cr+$datas->Credit_val;
								$total_balance = $total_balance+$datas->closing_balances;
							?>
								<td></td>
								<td>- {{number_format($datas->Credit_val,2)}}</td>
								<td>{{number_format($datas->closing_balances,2)}}</td>
							<?php
							}
						else{
							if($datas->name =='Bank'){
								$total_deb = $total_deb + $datas->Bank_val;
								$total_balance = $total_balance+$datas->closing_balances;
							?>

								<td>{{number_format($datas->Bank_val,2)}}</td>
								<td>{{number_format($datas->bank_payment,2)}}</td>
								<td>{{number_format($datas->closing_balances,2)}}</td>
							<?php
							}
						else{
							if($datas->name == 'Vendor'){
								$total_deb = $total_deb + $datas->po_payment;
								$total_balance = $total_balance+$datas->closing_balancess;

							?>
							<td>{{number_format($datas->po_payment,2)}}</td>
							<td></td>
							<td>{{number_format($datas->closing_balancess,2)}}</td>
							<?php
							}
						else{
							if($datas->name =='Localcustomer'){
								$total_deb = $total_deb + $datas->Credit_val;
								$total_cr = $total_cr+$datas->LocalCredit;
								$total_balance = $total_balance+$datas->closing_balances;
							?>
							<td>{{number_format($datas->Credit_val,2)}}</td>
							<td>- {{number_format($datas->LocalCredit,2)}}</td>
							<td>{{number_format($datas->closing_balances,2)}}</td>

							<?php
							}
						else{
							?>
							<td></td>
							<td></td>
							<td></td>
							<?php
							}
							}
							}
							}
							}
						?>
						<!-- <td>{{number_format($datas->closing_balance,2)}}</td> -->
						<td>
							<a href="{{route('generaledger.edit',$datas->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td style="font-weight: bold;">Total</td>
						<td id="TotalDebit">{{$total_deb}}</td>
						<td id="TotalCredit">{{$total_cr}}</td>
						<td id="closing_bal">{{$total_balance}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/Accounts/account.js')}}"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@endsection