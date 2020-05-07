@extends('layouts.app')
@section('style')
	<style type="text/css">
		.sale_order{
			font-size: 23px;
    		color: white;
		}
		.create{
			font-size: 16px;
			color: white;
		}
		.mt-12{
			margin-top: 12px;
		}
		.mt-15{
			margin-top: 15px;
		}
		hr {
			border: 1px solid;
		}
		.sale_order_icon{
			width: 35px;
		}
		.Cust_invo{
			font-size: 20px;
			margin-top: 10px;
			color: #29bb9c;
		}
		.order_invo{
			font-size: 22px;
			margin-top: 10px;
			color: #29bb9c;
		}
	</style>

@endsection
@section('content')
<!-- <h2>{{Auth::user()->email}}</h2> -->
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-md-9">
				<h3 class="Cust_invo">Customer Invoices</h3>
				<hr style="border: 1px solid #29bb9c;">
				<div class="row mt-10">
					<div class="col-md-3">
						<a href="{{url('/pos')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body _card_body">
					                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
					                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">POS Sales</h3>
					                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
					                    	<img src="{{asset('image/sale-icon/1.png')}}">
					                    </i>
					                </div> 
				                  	<p class="card-title text-md-center text-xl-left mt-10">Total Invoice</p> 
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/newinvoice')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body">
					               	<div class="row">
										<div class="col-md-6">
											<h6 class="create">Create</h6>
										</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row mt-12">
										<div class="col-md-9">
											<h3 class="sale_order">Sale Invoice</h3>
										</div>
										<div class="col-md-3">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/1.png')}}">
										</div>
									</div>
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/managesaleinvoice')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body">
									<div class="row mt-12">
										<div class="col-md-9">
											<h3 class="sale_order">Manage Invoices</h3>
										</div>
										<div class="col-md-3 mt-15">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/4.png')}}">
										</div>
									</div>
									<div class="row">
										<div class="col-md-10">
											<p class="text-center create">All Invoices</p>
										</div>
									</div>
				                </div>
	             			</div>
	             		</a>
					</div>
				</div>
				<h3 class="order_invo">Orders</h3>
				<hr style="border: 1px solid #29bb9c;">
				<div class="row mt-20">
					<div class="col-md-3">
						<a href="{{url('order/')}}"style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body">
					               <div class="row ">
										<div class="col-md-6">
											<h6 class="create">Create</h6>
										</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row mt-12">
										<div class="col-md-9">
											<h3 class="sale_order">Sale Orders</h3>
										</div>
										<div class="col-md-3">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/3.png')}}">
										</div>
									</div>
				                </div>
             				</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('order/create/')}}" style="text-decoration: none;">
							<div class="card _card">
				                <div class="card-body">
									<div class="row mt-12">
										<div class="col-md-9">
											<h3 class="sale_order">Manage Order</h3>
										</div>
										<div class="col-md-3 mt-15">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/4.png')}}">
										</div>
									</div>
									<div class="row">
										<div class="col-md-10">
											<p class="text-center create">All Sale Orders</p>
										</div>
									</div>
				                </div>
	             			</div>
	             		</a>
					</div>
				</div>
				<h3 class="Cust_invo">Quotations</h3>
				<hr style="border: 1px solid #29bb9c;">
				<div class="row mt-20">
					<div class="col-md-3">
						<a href="{{url('/createqouta')}}" style="text-decoration: none;">
							<div class="card _card">
								<div class="card-body">
					               <div class="row">
										<div class="col-md-6">
											<h6 class="create">Create</h6>
										</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<h3 class="sale_order">Price Quotation</h3>
										</div>
										<div class="col-md-3">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/3.png')}}">
										</div>
									</div>
				                </div>
	             			</div>
	             		</a>
					</div>
					<div class="col-md-3">
						<a href="{{url('/qoute')}}" style="text-decoration: none;">
							<div class="card _card">
			                	<div class="card-body">
									<div class="row mt-12">
										<div class="col-md-9">
											<h4 class="sale_order">Manage Quotation</h4>
										</div>
										<div class="col-md-3 mt-15">
											<img class="sale_order_icon" src="{{asset('image/sale-icon/4.png')}}">
										</div>
									</div>
									<div class="row">
										<div class="col-md-10">
											<p class="text-center create">All Quotations</p>
										</div>
									</div>
				                </div>
			                	
             				</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
