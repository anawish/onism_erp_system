   $("#category_id").change(function(){
				debugger;
       		 var catid = $(this).val();
       		 debugger;
				// $.ajax({
				// 		type: 'GET', //THIS NEEDS TO BE GET
				// 		url: '{{$video->id}}/shownew',
				// 		success: function (data) {
				// 		var obj = JSON.parse(data);
				// 		var your_html = "";
				// 		$.each(obj['getstamps'], function (key, val) {
				// 		your_html += "<p>My Value :" +  val + ") </p>"
				// 		});
				// 		$("#data").append(you_html); //// For Append
				// 		$("#mydiv").html(your_html)   //// For replace with previous one
				// 		},
				// 		error: function() { 
				// 		console.log(data);
				// 		}		
				// });

	        $.ajax({
	            url:'/get_subcats/'+catid,
	            type:'GET',
	            success:function(res){
	            	debugger;
	                res = JSON.parse(res);
	                console.log(res);
	                if(res.length != 0){
	                    $('select[name=product_sub_cat]').html('');
	                    res.forEach(element => {
	                        $('select[name=product_sub_cat]').append('<option value="'+element.id+'">'+element.sub_category+'</option>');
	                    });
	                    $('select[name=product_sub_cat]').prop('disabled',false);
	                }else{
	                    $('select[name=product_sub_cat]').find('option').remove();
	                    $('select[name=product_sub_cat]').prop('disabled',true);
	                }
	            }
	        });
   		});
	});