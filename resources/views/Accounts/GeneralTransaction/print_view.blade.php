<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Voucher Print</title>
    <style>	
        body {
            color: #2B2000;
			font-family: 'Helvetica';						
        }
        .invoice-box {
            width: 210mm;
            height: 50mm;
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
		.table{
			counter-reset: rowNumber;
		}
		.table .autonumber{
			counter-increment: rowNumber;
		}
		.table .autonumber td:first-child::before {
			content: counter(rowNumber);
		}
		.green {
			  line-height: 1.1;
			  border: solid limegreen;
		}
		.box {
			width: 47em;
			display: inline-block;
			vertical-align: top;
			font-size: 15px;

		}
		h1 {
			font-size: 30px;
		}
		/*h2 {
		  border-style: inset;
		  border-width: 7px;
		  border-color: coral;
		}*/
		/*div {
		  border-style: inset;
		  border-width: 7px;
		  border-color: coral;  
		}*/
		hr.new4 {
		  border: 1px solid red;
		  width: 10em;
		}
		p.inset {border-style: inset;}
    </style>
</head>
<body>
	<table>
		<tr>
			<td colspan="6">
				<img src="{{asset('logo/zlogo.png')}}" class="img-responsive" style="width: 200px;height: 100px;">
			</td>
			<td colspan="6">
				<h2 style="text-align: center;">Voucher</h2>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<span>Voucher No </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data->transaction_type}} #{{$data->doc_no}}</span><br>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<span>Document Date </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span>{{$data->doc_date}}</span><br>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<span>Posting Date</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data->posting_date}}</span><br>
			</td>
		</tr>
	</table>
	<br><br>
	<table>
		<thead>
			<tr class="heading">
				<td><span>Company Info</span></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<strong style="margin-left: -20px;">ABC Company</strong>
					<br>
					<span>412 Example South Street,Lahore</span>
					<br>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="table">
		<thead>
			<tr class="heading">
				<td>Sr#</td>
				<td>GL No#</td>
				<td>Name</td>
				<td>Description</td>
				<td>Debit</td>
				<td>Credit</td>
			</tr>
		</thead>
		<tbody>
			@foreach($Trans_Detail as $Trans_Details)
			<tr class="autonumber">
				<td></td>
				<td>{{$Trans_Details->gl_no}}</td>
				<td>{{$Trans_Details->name}}</td>
				<td>{{$Trans_Details->description}}</td>
				<td>{{$Trans_Details->debit}}</td>
				<td>{{$Trans_Details->credit}}</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td style="font-weight: 700">Net Total</td>
				<td>{{$data->total_debit}}</td>
				<td>{{$data->total_credit}}</td>
			</tr>
		</tfoot>
	</table>
	<!-- <div class="box green">
 		<h1>Avoid unexpected results by using unitless line-height.</h1>
	</div> -->
</body>
</html>