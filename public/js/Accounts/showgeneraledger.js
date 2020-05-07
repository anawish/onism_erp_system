$(document).ready(function(){
	$('#range').click(function(){
	debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var From = $('#From').val();
		var to = $('#to').val();
		var type = $("#name").val();
		if(From != '' && to != '')
		{
			$.ajax({
				type :"POST",
				url:"dateRange",
				dataType:"json",
				data:{
					_token: CSRF_TOKEN,
					From:From, 
					to:to,
					type:type
					
				},
				success:function(ddata)
				{
					$("tbody").html('');
					$.each( ddata, function( key, data ) {
 					let original_data = '<tr>'+
 						'<td></td>'+
						'<td>'+data.updated_date+'</td>'+
						'<td>'+data.type+'</td>'+
						'<td>'+data.invoice_no+'</td>'+
						'<td>'+data.payment_note+'</td>';
						let cons ='';
						if(data.payment != 0){
							cons = '<td>'+data.payment+'</td>';
						}else{
							cons = '<td></td>';
						}
						let cons2 ='';
						if(data.debit != 0){
							cons2 = '<td>'+data.debit+'</td>';
						}
						else{
							cons2 ='<td></td>';
						}
						let end='<td>'+data.closing_bla+'</td></tr>';
						original_data = original_data + cons + cons2 + end;
						
						$("tbody").append(original_data);
					});
					// $("#Total_Debit").html(ddata['Total_Debit']);
					// $("#TotalCredit").html(ddata['TotalCredit']);
					// $("#closing_bla").html(ddata['Closing_bla']);
					// $("#closing_balance").val(ddata['closing_balance']);
			
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});