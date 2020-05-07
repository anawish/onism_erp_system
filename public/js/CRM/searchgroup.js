$(document).ready(function(){
	
});
$("#cust_grp").on('change',function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var cust_grp = $(this).val();
		
	$.ajax({
			type: "POST",
			url : "SearchClient",
			dataType:"json",
			data:{
				_token: CSRF_TOKEN,
				cust_grp : cust_grp,
			},
			success :function(data){
				$("tbody").html('');
				$.each(data, function( key, data ) {
						$('tbody').append('<tr>'+
						'<td>'+data.cust_no+'</td>'+
						'<td>'+data.name+'</td>'+
						'<td>'+data.address+'</td>'+
						'<td>'+data.email+'</td>'+
						'<td>'+data.phone+'</td>'+
						'<td>'+
							'<a href="" class="btn btn-info btn-sm">View</a>'+
							'<a href="" style="margin-left:10px;"class="btn btn-info btn-sm">EDIT</a>'+
						'</td>'
						);
						
					});
				
			}
	});
});