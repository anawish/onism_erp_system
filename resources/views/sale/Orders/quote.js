$(document).ready(function(){

	// Add New Row
	var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control product_name" required="" id="product_name" name="product_name[]" onkeypress="SearchProduct(this)" value=""/><input type="hidden" name="product_id[]" id="product_id" class="form-control product_id"><ul class="product_det"></ul></td>';
        cols += '<td><input type="text" class="form-control qty" id="qty" onchange="qty_calculate(this)" required=""name="qty[]"/></td>';
        cols += '<td><input type="text" class="form-control price" id="price" required="" name="price[]"/></td>';
        cols += '<td><select class="form-control input-sm price_type" name="price_type[]" id=price_type""><option>Retail</option><option>Wholesale</option></select></td>';
        cols += '<td><input type="text" class="form-control tax_rate" id="tax_rate" name="tax_rate[]"onchange="qty_calculate(this)" value="0"/></td>';
        cols += '<td><input type="text" class="form-control product_tax" id="product_tax" readonly name="product_tax[]"/></td>';
        cols += '<td><input type="text" class="form-control discount_rate" id="discount_rate" name="discount_rate[]" onchange="qty_calculate(this)" value="0"/></td>';
        cols += '<td><input type="text" class="form-control totalAmount" required="" id="totalAmount" readonly name="totalAmount[]"/></td>';
        cols += '<td><input type="button" class="delete_row btn btn-md btn-danger" value="X"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on("click", ".delete_row", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1;
        total();
    });
    // End Row

});
// SEARCH CLIENT
	$('.ClientDetail').dblclick(function(e){
		var name ='';
		var address = '';
		var city = '';
		var country = '';
		var email = '';
		var phone = '';
		var balance = '';
		$(this).find('td').each (function(index, value) {
			debugger
			if(index == 1){
				$name =$(value).html(); 
			}
			if(index == 2){
				$address=$(value).html(); 
			}
			if(index == 3){
				$city=$(value).html(); 
			}
			if(index == 4){
				$country=$(value).html(); 
			}
			if(index == 5){
				$phone = $(value).html(); 
			}
			if(index == 6){
				$email=$(value).html(); 
			}
		  	if(index == 7){
				$balance=$(value).html(); 
			}
		});  
		$("#customerInfo").html(
					    // '<div class="clientinfo">'+
				        //     '<input type="hidden" name="customer_id" id="customer_id" value='+data[0].id+'>'+
				        // '</div>'+
				        '<div class="clientinfo" >'+
				            '<strong>'+$name+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong>'+$address+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong>'+$city+'</strong>'+
				        '</div>'+
				         '<div class="clientinfo">'+
				            '<strong>'+$country+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Phone:</span>'+
				           '<strong>'+$phone+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Email:</span>'+
				           '<strong>'+$email+'</strong>'+
				        '</div>'+
				         '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Balance:</span>'+
				           '<strong>'+$balance+'</strong>'+
				        '</div>'
					);
		$('#quote_detail tr').removeClass('highlighted');
		$(this).addClass('highlighted');
		$("#mymodal").modal('hide');
	})
// Search Client
	$("#search_client").keyup(function(){

		var query = $(this).val();
		$("#searchResult > ul").empty();
		
		$.ajax({
			type:"GET",
			url :'createqouta/'+query,
			dataType:"json",
			success:function(data){
					$.each(data,function(key,value){
				
					$("#searchResult > ul").append(
						'<li onclick="selectCustomer('+value.id+')">'+
							'<p>'+value.name+'&nbsp &nbsp'+value.phone+'</p>'+
						'</li>'
		            );
				});
			}
		});
	});

	function selectCustomer(id){

		$("#searchResult > ul").empty();
		
			$.ajax({
			 	type:"GET",
			 	url:'customerinfo/'+id,
			 	dataType:"json",
			 	success:function(data){
			 		
			 			$("#customerInfo").append(
							'<div class="clientinfo">'+
					            '<input type="hidden" name="customer_id" id="customer_id" value='+data[0].id+'>'+
					        '</div>'+
					        '<div class="clientinfo" >'+
					            '<strong>'+data[0].name+'</strong>'+
					        '</div>'+
					        '<div class="clientinfo">'+
					            '<strong>'+data[0].address+'</strong>'+
					        '</div>'+
					        '<div class="clientinfo">'+
					            '<strong>'+data[0].city+'</strong>'+
					        '</div>'+
					        '<div class="clientinfo">'+
					        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Phone:</span>'+
					           '<strong>'+data[0].phone+'</strong>'+
					        '</div>'+
					        '<div class="clientinfo">'+
					        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Email:</span>'+
					           '<strong>'+data[0].email+'</strong>'+
					        '</div>'
						);
			 		}
			});
	}


// Search Product
	function SearchProduct(obj){
		$(obj).closest('tr').find(".product_det").show();
		var product = $(obj).val();

		$(obj).closest('tr').find("ul").empty();

		$.ajax({
			type:"GET",
			url:'searchproduct/'+product,
			dataType:"json",
			success:function(data){
				$.each(data,function(key,data){
					$(obj).closest('tr').find("ul").append(
						'<li onclick="selectProduct('+data.id+', this)">'+
							'<p>'+data.product_name+'</p>'+
						'</li>'
					);
				})
			}
		})
	}

	function selectProduct(id, obj){

		$.ajax({
			type:"GET",
			url:'productDetail/'+id,
			dataType:"json",
			success:function(data){
				$(obj).closest('tr').find('#product_id').val(data[0].id);
			 	$(obj).closest('tr').find('#product_name').val(data[0].product_name);
				$(obj).closest('tr').find("#price").val(data[0].retail_price);
				$(obj).closest('tr').find("#tax_rate").val(data[0].tax_rate);
				//$(obj).closest('tr').find("#discount_rate").val(data[0].discount_rate);
			}
		});

		$(obj).closest('tr').find(".product_det").hide();
	}
	
	// $('tbody').delegate('.qty, .price','keyup',function(){
	// 	var tr = $(this).parent().parent();
	// 	var qty = tr.find('.qty').val();
	// 	var price = tr.find('.price').val();
	// 	var product_tax = tr.find('.product_tax').val(); 
	// 	var tax_rate = tr.find('.tax_rate').val();
	// 	var discount_rate = tr.find('.discount_rate').val();
	// 	var count_discount = (qty * price * discount_rate/100);
	// 	var amount =  (qty * price * tax_rate/100);
	// 	var totalAmount = (qty * price + amount - count_discount);

	// 	tr.find('.product_tax').val(amount);
	// 	tr.find('.totalAmount').val(totalAmount);
	// 	tr.find('.discount_rate').val(count_discount);
	// 	total();
	// 	count_tax();
	// 	discount_count();
	// });

	// function count_tax(){
	// 	total_tax = 0;
	// 	$('.product_tax').each(function(i,e){
	// 		var product_tax = $(this).val()-0;
	// 		total_tax +=product_tax;

	// });
	// 	$('.total_tax').val(total_tax);
	// }

	// function discount_count(){
	// 	discount = 0 ;
	// 	$('.discount_rate').each(function(i,e){
	// 		var discount_rate  = $(this).val()-0	;
	// 		discount +=discount_rate;
	// 	});
	// 	$('.total_discount').val(discount);	
	// }

	// function total(){
	// 	var total = 0;
	// 	$('.totalAmount').each(function(i,e){
	// 		var totalAmount = $(this).val()-0;
	// 		total +=totalAmount;
	// 	});
	// 	$('.sub_total').val(total);
	// 	$('.grand_total').val(total);
	// }



	$('#shipping').keyup(function(){

		var shipping = $(this).val()-0;
		var subtotal = $('#sub_total').val();
		var grandTotal = parseFloat(subtotal)+parseFloat(shipping);
		$('#grand_total').val(grandTotal);

	});
function qty_calculate(obj){
		debugger
		// var AvailableQty = parseFloat($(obj).closest('tr').find("#receive_qty").val());
		var CurQTY = parseFloat($(obj).closest('tr').find("#qty").val());
		var discount = parseFloat($(obj).closest('tr').find("#discount_rate").val());
		var price  = parseFloat($(obj).closest('tr').find("#price").val());
		var TaxRate = parseFloat($(obj).closest('tr').find("#tax_rate").val());
		var shipping = $("#shipping").val();

		var Tax = CurQTY * price * TaxRate/100;
		var TotalAmount = CurQTY * price + Tax - discount;
		var SubTotal = 0;
		var Totaltax = 0;
		var Totaldiscount = 0;
		var GrandTotal = 0; 
	
		// if (CurQTY <= AvailableQty) {
			$(obj).closest('tr').find("#product_tax").val(Tax);
			$(obj).closest('tr').find("#totalAmount").val(TotalAmount);
			$("#item_detail > tr").each(function(){
				SubTotal = SubTotal + parseFloat($(this).find("#totalAmount").val());
				Totaltax = Totaltax + parseFloat($(this).find("#product_tax").val());
				Totaldiscount = Totaldiscount + parseFloat($(this).find("#discount_rate").val());
				var GrandTotal = shipping + SubTotal;
			
			});
			//Shipping_charge = Shipping_charge +  parseFloat($(this).find("#shipping").val());
			$("#sub_total").val(SubTotal);
			$("#total_tax").val(Totaltax);
			$("#total_discount").val(Totaldiscount);
			$("#grand_total").val(SubTotal);
				
		// }else{
		// 	alert("Your Quantity is Exceed Limit");
		// 	$(obj).closest('tr').find("#qty").val(0);
		// }
		
	}
	// Date Picker
	var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
	format: 'yy-mm-dd',
	todayHighlight: true,
	orientation: 'bottom right',
	autoclose: true,
	container: '#date_picker'
	};
	var optComponent = {
	  format: 'yy-mm-dd',
	  container: '#due_date',
	  orientation: 'bottom right',
	  todayHighlight: true,
	  autoclose: true
	};
	$( '#invoice_date' ).datepicker( optSimple );
	$('#dueDate').datepicker( optComponent )
	$( '#invoice_date,#dueDate' ).datepicker( 'setDate', today );
