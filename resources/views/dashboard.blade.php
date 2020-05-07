@extends('layouts.app')

@section('content')
<!-- <h2>{{Auth::user()->email}}</h2> -->
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.partials.sidebar')
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content" style="">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color">011</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/1.png')}}">
				                    </i>
				                </div> 
			                  	<p class="card-title text-md-center text-xl-left mt-20">Total Invoice</p> 
			                </div>
             			</div>
					</div>
					<div class="col-md-3">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" >0</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/2.png')}}">
				                    </i>
				                </div> 
			                  	<p class="card-title text-md-center text-xl-left mt-20">This Month Invoices</p> 
			                </div>
             			</div>
					</div>
					<div class="col-md-3">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" >011</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/3.png')}}">
				                    </i>
				                </div> 
			                  	<p class="card-title text-md-center text-xl-left mt-20">Today Sales</p> 
			                </div>
             			</div>
					</div>
					<div class="col-md-3">
						<div class="card _card">
			                <div class="card-body _card_body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center card_content">
				                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 content_color" >011</h3>
				                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0 mt-25">
				                    	<img src="{{asset('image/sale-icon/4.png')}}">
				                    </i>
				                </div> 
			                  	<p class="card-title text-md-center text-xl-left mt-20">This Month Sales</p> 
			                </div>
             			</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="card graph_card">
			                <div class="card-body">
				                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center" >
				                    <p class="mb-0 mb-md-2 mb-xl-0 order-md-1 graph_content">
				                    Graphical Presentation Of Invioces And Sales Done In Last 30 Days</p>
				                </div> 
			                </div>
			                <div class="card">
								<ul class="list-group list-group-flush">
								    <li class="list-group-item bg_listgroup"></li>
								    <div class="row text-center graph_footer">
								    	<div class="col-md-3">
								    		<span class="list_item">Total Income</span><br>
								    		<span class="total_income">$  <span class="total_income">0.0000</span> </span>
								    	</div>
								    	<div class="col-md-3">
								    		<span class="list_item">Total Expenses</span><br>
								    		<span class="total_expense">$ <span class="total_expense"> 0.0000</span> </span>
								    	</div>
								    	<div class="col-md-3">
								    		<span class="list_item">Today Profit</span><br>
								    		<span class="today_profit">$  <span class="today_profit"> 0.0000</span> </span>
								    	</div>
								    	<div class="col-md-3">
								    		<span class="list_item">Today Revenue</span><br>
								    		<span class="today_revenue">$  <span class="today_revenue"> 0.0000</span> </span>
								    	</div>
								    </div>
								</ul>
             				</div>
             			</div>
					</div>
					<div class="col-md-4">
						<div class="card circle_card">
			                <div class="card-header text-md-center _circle_header">
								Income Vs Expenses
							</div>
			               	<div class="card-body">
						    	<div class="outer circle shapeborder">
						    		<div class="inner circle shapeborder">
						    			<div class="inner circle inner_shapeborder text-center">
						    				<div class="incom mt-35">
						    					<span class="text-center ">Income</span><br>
						    					<span>0</span>
						    				</div>
						    			</div>
						    		</div>
								</div>
						  	</div>
						  	<div class="card">
								<ul class="list-group list-group-flush bg-primary">
								    <li class="list-group-item _circle_footer"></li>
								</ul>
             				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
