<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Print Sale Invoice</title>
    <style>	
        body {
            color: #2B2000;
			font-family: 'Helvetica';						
        }
        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 4mm;
            border: 0;
            font-size: 12pt;
            line-height: 14pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: left;
			border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }
        .subtotal {
            page-break-inside:avoid;
        }

        .subtotal tr td {
            line-height: 10pt;
		    padding: 6pt;
        }

		.subtotal tr td {          
			border: 1px solid #ddd;
        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
			margin-right:20pt;
        }

        .invoice-box table td {
            padding: 10pt 4pt 8pt 4pt;
            vertical-align: top;

        }

		.invoice-box table.top_sum td {
            padding: 0;
			font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;
        }
      

       table tr.details td {
            padding-bottom: 20pt;
        }

		   .invoice-box table tr.item td{
            border: 1px solid #ddd;
        }

        table tr.b_class td{
            border-bottom: 1px solid #ddd;
        }

       table tr.b_class.last td{
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 400pt;
        }

        .myco2 {
            width: 200pt;
        }

        .myw {
            width: 300pt;
            font-size: 14pt;
            line-height: 14pt;
        }

        .mfill {
            background-color: #eee;
        }

		 .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;
        }
		.party {
		border: #ccc 1px solid;
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
				<h2 style="text-align: center;">Sale Invocie</h2>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Invoice No </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>SI #{{$data['invoice_no']}}</span><br>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Invoice Date </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data['invoicedate']}}</span><br>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Due Date </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data['invoice_duedate']}}</span>
			</td>
		</tr>
	</table>
	<br><br>

	<table class="border">
		<thead>
			<tr class="heading">
				<td>
					<span>Our Info</span>
				</td>
				<td>
					<span>Customer</span>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr class="border">
				<td>
					<strong>ABC Company</strong>
					<br>
					<span>412 Example South Street,</span>
					<br>
					<span>Lahore</span>
					<br>
					<span>Pakistan</span>
					<br>
					<span>Phone :</span>   <span>0345678909</span>
					<br>
					<span>Email :</span>   <span>abc@gmail.com</span>
					<br>
					<span>Tax-ID :</span>  <span>2233445</span>
				</td>
				@foreach($SupplierDetail as $detail)
				<td >
					
					<strong>{{$detail->name}}</strong>
					<br>
					<span>{{$detail->address}}</span>
					<br>
					<span>{{$detail->city}}, {{$detail->country}}</span>
					<br>
					<span>{{$detail->country}}</span>
					<br>
					<span>phone :</span>  <span>{{$detail->phone}}</span>
					<br>
					<span>Email :</span>  <span>{{$detail->email}}</span>
				</td>
				@endforeach
			</tr>
		</tbody>
	</table>

	<br><br>
	<table class="table">
		<thead>
			<tr class="heading">
				<td>Sr#</td>
				<td>Product Name</td>
				<td>Qty</td>
				<td>Price</td>
				<td>Discount</td>
				<td>Tax</td>
				<td>Amount</td>
			</tr>
		</thead>
		<tbody>
			@foreach($invoice as $productdet)
			<tr>
				<td>1</td>
				<td>{{$productdet['product_name']}}</td>
				<td>{{$productdet['qty']}}</td>
				<td>${{$productdet['price']}}</td>
				<td>${{$productdet['discount']}}</td>
				<td>${{$productdet['tax']}}</td>
				<td>${{$productdet['total_amount']}}</td>
			</tr>
			@endforeach
		
			<tr>
				<th colspan="4"></th>
				<th colspan="2">Summary</th>
				<th colspan="4"></th>
			</tr>
			<tr>
				@foreach($SupplierDetail as $detail)
				<td colspan="4"><strog>Status : {{$detail->status}}</strong></td>
				<td colspan="2">sub total</td>
				<td colspan="4"> ${{$detail->sub_total}}</td>
				@endforeach
			</tr>
			<tr>
				@foreach($SupplierDetail as $detail)
				<td colspan="4">
					<span>Total Amount :</span>  <strong>${{$detail->grand_total}}</strong>
				</td>
				<td colspan="2">Total Discount</td>
				<td colspan="4"> $ {{$detail->total_discount}}</td>
				@endforeach
			</tr>
			<tr>
				@foreach($SupplierDetail as $detail)
				<td colspan="4">Paid Amount  : <span> $ {{number_format($data['payment'],2)}}</span></td>
				<td colspan="2">Total Tax</td>
				<td colspan="4"><strong>${{$detail->total_tax}}</strong></td>
				@endforeach
			</tr>
			<tr>
				
				<td colspan="4"></td>
				<td colspan="2">Balance Due :</td>
				<td colspan="4"><strong>{{number_format($data->due_balance,2)}}</strong></td>
			
			</tr>
		<!-- 	<tr>
				<td colspan="4"></td>
				<td colspan="2">Current Balance :</td>
				<td colspan="4"><strong>$199.00</strong></td>
			</tr>
 -->
		</tbody>
	</table>

	<br>

</body>
</html>