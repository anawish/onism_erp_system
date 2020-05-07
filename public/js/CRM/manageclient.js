$(document).ready(function(){
	$("#file").on('change',function(){
		debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var fd = new FormData();
		var files = $("#file")[0].files[0];
		var id  = $("#customer_id").val();
		fd.append('file',files);
		fd.append('cust_id',id);
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		    	}
			});
		$.ajax({
			type: "POST",
			url : "uploadimg",
			contentType: false,
            processData: false,
			data : {
				"_token": "{{ csrf_token() }}",
				fd:fd
			},
			success:function(data){
				alert(data);
			}
		});
	});
});
//Search Client BY Group
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
