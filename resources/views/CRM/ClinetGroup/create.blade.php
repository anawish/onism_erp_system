@extends('layouts.app')
@section('style')
<style type="text/css">
	table {
    counter-reset: rowNumber;
	}

	table .autonumber{
	    counter-increment: rowNumber;
	}

	table .autonumber td:first-child::before {
	    content: counter(rowNumber);
	}
	.title{
		font-weight: 700px;
		font-family: serif;
	}
	.card_title{
		margin-left: 27px;
		font-weight: bold;
		font-family: serif;
	}
	strong{
		font-family: serif;
		font-size: 18px;
	}
	span{
		color: #9c9ea0;
	}
	.btn-success{
		background-color: #967adc !important;
		border: none;
	}
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row mt-10">
				<div class="col-md-12">
					<h4 class="title">Add New Client Group</h4>
					@if (session('status'))
				        <div class="alert alert-success">
				        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
				        </div>
				    @endif
				</div>
			</div>
			<hr>
			<div class="card card-block">
				<form method="POST" action="{{action('ClientGroupController@store')}}">
					@csrf
					<br><br>
					<div class="form-group row">
	                    <span class="col-sm-2 col-form-label text-center"> Group Name</span>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control form-control-sm margin-bottom" name="group_name" required="" style="margin-top: 5px;">
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <span class="col-sm-2 col-form-label text-center" for="phone"> Group Description</span>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control form-control-sm margin-bottom" name="group_desc" required="" style="margin-top: 5px;">
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <span class="col-sm-2 col-form-label text-center"></span>
	                    <div class="col-sm-6">
	                        <input type="submit" class="btn btn-success btn-sm margin-bottom" style="margin-top: 5px;padding: 9px 50px;" value="Add Group">
	                    </div>
	                </div>
            	</form>
			</div>
		</div>
	</div>
</div>
@endsection