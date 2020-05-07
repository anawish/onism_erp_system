$(document).ready(function(){
	
});

$("#category_id").on('change',function(){

	var id = $(this).val();
	if(id){
		debugger
		$.ajax({
			// url: "{{route('create/')}}"+id,
			url: "product/"+id,
			type:"GET",
			dataType: "json",
			success:function(data){
				$("#sub_category").empty();
				$.each(data,function(key,value){
					$("#sub_category").append('<option value="'+value.id+'">'+value.sub_category+'</option>');
				});
			}
		});
	}
	else
	{
		$("#sub_category").empty();
	}
});