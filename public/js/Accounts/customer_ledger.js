$(document).ready(function() {
	
	$('#range').click(function(){
	debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				type :"POST",
				url:"CustomerDateFilter",
				dataType:"json",
				data:{
					_token: CSRF_TOKEN,
					From:From, 
					to:to
					
				},
				success:function(data)
				{
					$("tbody").html('');
					$.each(data, function( key, data ) {
						$('tbody').append('<tr>'+
						'<td>'+data.cust_no+'</td>'+
						'<td>'+data.name+'</td>'+
						'<td>'+data.lastUpdated+'</td>'+
						'<td>'+data.TotalDebit+'</td>'+
						'<td>'+data.TotalCredit +'</td>'+
						'<td>'+data.closing_balance+'</td>'+
						'<td>'+
							'<a href="" class="btn btn-info btn-sm">View</a>'+
						'</td>'
						);
						
					});
			
				}
			});
		}
		else
		{
			alert("Please Select the Customer Number");
		}
	});

	
});
$('#date_range').click(function(){
	debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var From_date = $('#From_date').val();
		var to_date = $('#to_date').val();
		if(From_date != '' && From_date != '')
		{
			$.ajax({
				type :"POST",
				url:"DateFilter",
				dataType:"json",
				data:{
					_token: CSRF_TOKEN,
					From_date:From_date, 
					to_date:to_date
					
				},
				success:function(data)
				{
					$("tbody").html('');
					$.each(data, function( key, data ) {
						$('tbody').append('<tr>'+
						'<td>'+data.cust_no+'</td>'+
						'<td>'+data.name+'</td>'+
						'<td>'+data.lastUpdated+'</td>'+
						'<td>'+data.TotalDebit+'</td>'+
						'<td>'+data.TotalCredit +'</td>'+
						'<td>'+data.closing_balance+'</td>'
						);
						
					});
			
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});



	// Bootstrap datepicker
	$('.input-daterange input').each(function() {
	  $(this).datepicker('clearDates');
	});
	