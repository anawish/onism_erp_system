<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="{{asset('logo/zlogo.png')}}" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Print Good Receive Note</title>
    <style>	
        body {
            color: #2B2000;
			font-family: 'Helvetica';						
        }
        table {
            width: 100%;
            line-height: 16pt;
			border-collapse: collapse;
        }
        table tr.heading td {
            background: #515151;
            color: #FFF;
        }
		.table {
		    counter-reset: rowNumber;
			}

		.table tr .autonumber{
			    counter-increment: rowNumber;
			}

		.table tr .autonumber td:first-child::before {
			    content: counter(rowNumber);
			}
    </style>
</head>

<body>
	<table>
		<tr>
			<td colspan="6">
				<img src="{{asset('logo/zlogo.png')}}" class="img-responsive"style="width: 200px;height: 100px;">
			</td>
			<td colspan="6">
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Purchase Number :</span>&nbsp;&nbsp;&nbsp;<span>{{$data['invoice_no']}}</span>
				
			</td>
		</tr>
	</table>
	<br><br>

	<table class="border">
		<thead>
			<tr>
				<td>
					<h4 style="margin-left: 230px !important;">Goods Receive Note</h4>
				</td>
			</tr>
		</thead>
	</table>
	<br><br>
	<table>
		<tbody>
			<tr>
				<td colspan="6">
					<span>Doc Date :</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
					<span style="text-decoration: underline;">{{$data['order_date']}}</span>
				</td>
				<td colspan="6">
					<span>Posting Date :</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</span> <span style="text-decoration: underline;">{{$data['due_date']}}</span>
				</td>

			</tr>
		</tbody>
	</table>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr class="heading">
				
				<td style="width: 20%;">Goods</td>
				<td>Order Qty</td>
				<td>PO NO #</td>
				<td>Unit</td>
			</tr>
		</thead>
		<tbody>
			@foreach($product as $products)
			<tr class="autonumber">
				<td>{{ucfirst($products['product_name'])}}</td>
				<td>{{$products['qty']}}</td>
				<td>{{$products['invoice_no']}}</td>
				<td>{{$products['unit']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<div class="row">
		<div class="col-sm-8">
			<ol class="g">
			  	<li>Account/Fanace dept. copy</li>
			  	<li>Supplier Copy</li>
			  	<li>Store Goods Inwards Copy</li>
			</ol>
		</div>
	</div>
</body>
</html>