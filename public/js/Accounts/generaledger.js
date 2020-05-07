$(document).ready(function(){
	$('#range').click(function(){
	debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var From = $('#From').val();
		var to = $('#to').val();
		var customer_id = $("#customer_id").val();
		if(From != '' && to != '')
		{
			$.ajax({
				type :"POST",
				url:"daterange",
				dataType:"json",
				data:{
					_token: CSRF_TOKEN,
					From:From, 
					to:to,
					customer_id : customer_id
				},
				success:function(ddata)
				{
					$("tbody").html('');
					$("#Total_Debit").html('');
					$("#TotalCredit").html('');
					$("#closing_bla").html('');
					$("#closing_balance").val('');
					$.each( ddata['data'], function( key, data ) {
 					let original_data = '<tr>'+
						'<td>'+data.id+'</td>'+
						'<td>'+data.type+'</td>'+
						'<td>'+data.invoice_no+'</td>'+
						'<td>'+data.updated_date+'</td>'+
						'<td>'+data.payment_note+'</td>';
						let cons ='';
						if(data.debit == 0){
							cons = '<td></td>;'
						}else{
							cons = '<td>'+data.debit+'</td>';
						}
						let cons2 ='';
						if(data.payment ==0){
							cons2 = '<td></td>';
						}
						else{
							cons2 ='<td>'+data.payment+'</td>';
						}
						let end='<td>'+data.closing_balance+'</td></tr>';
						original_data = original_data + cons + cons2 + end;
						
						$("tbody").append(original_data);
					});
					$("#Total_Debit").html(ddata['Total_Debit']);
					$("#TotalCredit").html(ddata['TotalCredit']);
					$("#closing_bla").html(ddata['Closing_bla']);
					$("#closing_balance").val(ddata['closing_balance']);
			
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});