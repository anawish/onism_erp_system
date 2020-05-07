@extends('layouts.app')
@section('style')
<style type="text/css">
	.card-block{
		box-shadow: 0px 1px 1px rgb(142, 124, 124);
	}
	.btn-info{
		padding: 6px 52px;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			@foreach($data as $datas)
			<form method="POST" action="{{action('BalanceController@update',$datas->id)}}">
				{{ csrf_field() }}
		        @method('PUT')
				<div class="card text-center card-block" style="margin-top: 10px;">
	  				<div class="card-header">
	  					<h4>Current Balance N {{ number_format($datas->balance,2)}}</h4>
	  				</div>
					<div class="card-body">
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label text-center">Amount</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control form-control-sm" name="balance">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label text-center"></label>
						    <div class="col-sm-4">
						      <input type="submit" class="btn btn-info btn-sm" value="Add Balance">
						    </div>
						</div>
						<h6 class="text-center">Payment History</h6>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody id="activity">
                            	<tr>
                            		<td>N {{number_format($datas->balance,2)}}</td>
                            		<td>{{$datas->lastUpdated}} Account Recharge by admin</td>
                        		</tr>
                            </tbody>
                        </table>
					</div>
				</div>
			</form>
			@endforeach
		</div>
	</div>
</div>
@endsection