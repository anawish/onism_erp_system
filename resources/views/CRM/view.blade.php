@extends('layouts.app')
@section('style')
<style type="text/css">
	.profile_img{
		margin-top: 20px;
	    width: 250px;
	    align-self: center;
	}
	.mt-30{
		margin-top: 30px;
	}
	.btn-md{
		padding: 6px 7px;
	}
	.tag-pill{
		color: white;
	    width: 86px;
	    text-align: center;
	    border-radius: 5px;
	}
	.card-block{
		box-shadow: 2px 3px 3px rgb(142, 124, 124);
	}
	#name {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    outline:none;
    box-shadow:none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		@include('layouts.partials.sidebar')
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-block">
						@foreach($data as $datas)
						<h4 class="text-center mt-30">{{$datas->name}}</h4>
						@endforeach
					    <img class="card-img-top profile_img" src="{{asset('image/'.$datas->picture)}}" alt="Card image" id="files" onclick ="submit(this)">
					    <div class="card-body">
					    	<hr>	
					      	<div class="user-button">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a href="#sendMail" data-toggle="modal" data-remote="false" class="btn btn-primary btn-md" data-type="reminder">
                                        	<i class="fa fa-envelope"></i> 
                                        	Send Message                                       
                                       	</a>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($data as $datas)

                                        <a href="{{route('client.edit',$datas->id)}}" class="btn btn-info btn-md">
                                        <i class="fa fa-pencil"></i> 
                                        	Edit Profile                                   
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h3>Balance</h3>
                                    $ {{number_format($totalbal,2)}}
                                    <hr>
                                    <h5>Balance Summary</h5>
                                    <hr>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="tag tag-pill bg-primary float-right">$ {{number_format($income,2)}}</span>
                                            Income                                       
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <span class="tag tag-default tag-pill bg-danger float-right">$ {{number_format($grand_total,2)}}</span>
                                            Sales  
                                                                             
                                        </li>
                                      
                                    </ul>
                                    <hr>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h5>Client Group  
                                        @foreach($client_group as $client_groups)
                                        <small>{{$client_groups->title}}</small>
                                        @endforeach
                                    </h5>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="offset-md-2 col-md-4">
                                    <a href="" class="btn btn-danger btn-sm">
                                    	<i class="icon-pencil"></i>
                                    	 Change Password                                   
                                    </a>
                                </div>
                                <div class="col-md-12"><br>
                                    <h5>Change Customer Picture</h5>
                                    @foreach($data as $datas)
                                    <input type="hidden" name="customer_id" id="customer_id" value="{{$datas->id}}">
                                    @endforeach
                                    <input type="file" name="file" id="file">
                                </div>
                                <div id="progress" class="progress1">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                            </div>
					    </div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card card-block">
                        <h4 class="text-center" style="margin-top: 20px;">Customer Details</h4>
                        @foreach($data as $datas)
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Name</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->name}}             
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Company</strong>
                            </div>
                            <div class="col-md-9">
                                zeehub                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong> Address</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->address}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>City</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->city}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Region</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->region}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Country</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->country}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>PostBox</strong>
                            </div>
                            <div class="col-md-9">
                            	{{$datas->postbox}}
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong>Email</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->email}}                              
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-lg">
                            <div class="col-md-3 text-center">
                                <strong> Phone</strong>
                            </div>
                            <div class="col-md-9">
                                {{$datas->phone}}                               
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-4 text-center">
                                <a href="{{url('/clientinvoice',$datas->id)}}" class="btn btn-primary btn-lg">
                                	<i class="fa fa-print"></i> 
                                	View Invoices
                            	</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{url('/transcations',$datas->id)}}" class="btn btn-success btn-lg">
                                	<i class="fa fa-eye"></i>
                                   View AllTransactions                                   
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{url('/balance',$datas->id)}}" class="btn btn-primary btn-lg">
                                	<i class="fa fa-wallet"></i>Wallet                                    
                                </a>
                            </div>
                        </div>
                        <hr>
                        <h6 class="text-center">Wallet Recharge/Payment History</h6>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody id="activity">
                            	<tr>
                            		<td>$ {{number_format($datas->balance,2)}}</td>
                            		<td>{{$datas->created_at}} Account Recharge by admin</td>
                        		</tr>
                            </tbody>
                        </table>
                        @endforeach
                	</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/js/CRM/manageclient.js') }}"></script>
@endsection
