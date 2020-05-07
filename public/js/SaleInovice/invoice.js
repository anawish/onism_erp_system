$(document).ready(function(){
	 
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	// Add New Row
	window.MyLocation = {}; 
	var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");

 		var cols = "";
 		
        cols += '<td><div class="input-group"><input type="text" class="form-control form-control-sm product_name" required id="product_name" name="product_name[]" onkeypress="SearchProduct(this)"/><input type="hidden" name="product_id[]" id="product_id" class="form-control product_id"><div class="input-group-prepend"><div class="input-group-text" style="height: 31px;"><i class="fa fa-search-plus searchbtn" data-toggle="modal" data-target="#searchitem" onclick="searchbtn(this)"></i></div></div></div><ul class="product_det"></ul></td>';
        cols += '<td><input type="text" class="form-control form-control-sm qty" id="qty" onchange="qty_calculate(this)" required name="qty[]"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm price" id="price" onchange="qty_calculate(this)" name="price[]" readonly/></td>';
        cols += '<td class="d-none"><input type="hidden" name="receive_qty" id="receive_qty" class="receive_qty"></td>'
        cols += '<td><select class="form-control input-sm form-control-sm price_type" name="price_type[]" id=price_type""><option>Retail</option><option>Wholesale</option></select></td>';
        cols += '<td><input type="text" class="form-control form-control-sm tax_rate" id="tax_rate" value="0" name="tax_rate[]"onchange="qty_calculate(this)"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm product_tax" id="product_tax" readonly name="product_tax[]"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm discount_rate" id="discount_rate" name="discount_rate[]" onchange="qty_calculate(this)" value="0"/></td>';
        cols += '<td><input type="text" class="form-control-plaintext form-control-sm totalAmount" required id="totalAmount" readonly name="totalAmount[]"/></td>';
        cols += '<td><input type="button" class="delete_row btn btn-sm btn-danger" onclick="remove_qty()" value="X"></td>';
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
// Client Detail
	$('.ClientDetail tr').dblclick(function(e){
		var name ='';
		var address = '';
		var city = '';
		var country = '';
		var email = '';
		var phone = '';
		var balance = '';
		var group_id = '';
		$(this).find('td').each (function(index, value) {
			if(index == 1){
				$name =$(value).html(); 
				var input = $(value).find('input');
            	$client_id = $(input).val();
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
			if(index == 8){
				$group_id = $(value).html();
			}
		});  
		$("#customerInfo").html(
					    '<div class="clientinfo">'+
				            '<input type="hidden" id="client_id" name="client_id" required value="'+$client_id+'">'+
				        '</div>'+
				        '<div class="clientinfo" >'+
				            '<strong id="c_name">'+$name+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong id="c_address">'+$address+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong id="c_city">'+$city+'</strong>'+
				        '</div>'+
				         '<div class="clientinfo">'+
				            '<strong id="c_country">'+$country+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Phone:</span>'+
				           '<strong id="c_phone">'+$phone+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Email:</span>'+
				           '<strong id="c_email">'+$email+'</strong>'+
				        '</div>'+
				         '<div class="clientinfo">'+
				        	'<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Balance:</span>'+
				           '<strong>'+$balance+'</strong>'+
				        '</div>'+
				         '<div class="clientinfo">'+
				            '<input type="hidden" id="group_id" name="group_id" required value="'+$group_id+'">'+
				        '</div>'

					);
		$('.supplierDetail tr').removeClass('highlighted');
		$(this).addClass('highlighted');
		$("#mymodal").modal('hide');
	});
// Search Client
	$("#search_client").keyup(function(){

		var query = $(this).val();
		$("#searchResult > ul").empty();
		
		$.ajax({
			type:"GET",
			url :'newinvoice/'+query,
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
			 	url:'customerdetail/'+id,
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
			    $(obj).closest('tr').find("#receive_qty").val(data[0].receive_qty);
				 // $(obj).closest('tr').find("#qty").val(data[0].receive_qty);
				 $(obj).closest('tr').find("#tax_rate").val(data[0].tax_rate);
				// var discount_rate = $(obj).closest('tr').find("#discount_rate").val(data[0].discount_rate);
			}
		});

		$(obj).closest('tr').find(".product_det").hide();
	}

	$('#shipping').keyup(function(){
		var shipping = $(this).val()-0;
		var subtotal = $('#sub_total').val();
		var grandTotal = parseFloat(subtotal)+parseFloat(shipping);
		$('#grand_total').val(grandTotal);

	});
	

	//Check Limit Quanatity
	function qty_calculate(obj){
		debugger
		var AvailableQty = parseFloat($(obj).closest('tr').find("#receive_qty").val());
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
				
			});
			//Shipping_charge = Shipping_charge +  parseFloat($(this).find("#shipping").val());
			var GrandTotal = shipping + SubTotal;
			$("#sub_total").val(SubTotal);
			$("#total_tax").val(Totaltax);
			$("#total_discount").val(Totaldiscount);
			$("#grand_total").val(GrandTotal);
		// }else{
		// 	alert("Your Quantity is Exceed Limit");
		// 	$(obj).closest('tr').find("#qty").val(0);
		// }
	}

	// On Change
	$("#pmethod").on('change',function(){
		 var type = $("#pmethod").val();
		if($(this).val() == '1'){
			$("#type").html('<input type="hidden" name="type" class="type_val" value="CR">');
		}
		if($(this).val() == '3'){
			$("#type").html('<input type="hidden" name="type" class="type_val" value="BP">');
		}
	});

	// Make Payment 
	$("#make_payment").click(function(){
		debugger
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var payment = $("#payment").val();
		var updated_date = $("#updated_date").val();
		var pmethod = $("#pmethod").val();
		var invoice_no = $("#invoice_no").val();
		var client_id = $("#client_id").val();
		var account_type = $("#account_type").val();
		var invoice_no = $("#invoice_no").val();
		var payment_note = $("#payment_note").val();
		var type = $(".type_val").val();
		var id = $("#id").val();
		
		if($("#account_type").val() == ''){
			alert('error: Account is required');
		}
		else{
			$.ajax({
			type: "POST",
			url: "Updatecourierstatus",
			dataType:"json",
			data:{
				_token: CSRF_TOKEN,
				payment:payment,
				updated_date:updated_date,
				pmethod:pmethod,
				invoice_no:invoice_no,
				account_type:account_type,
				invoice_no:invoice_no,
				id:id,
				client_id:client_id,
				payment_note:payment_note,
				type:type
			},
			success:function(return_data)
			{
				$("#paymade").html( return_data[0].payment);
				$("#pmethod_type").html(return_data[0].pmethod);
				$("#pstatus").html(return_data[0].status);
				// $("#mpayment").html(return_data[0].status);
				$('#part_payment').modal('hide');

			}
		})
		}
		
	});

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
	$('#invoice_date' ).datepicker( optSimple );
	$('#dueDate').datepicker( optComponent )
	$( '#invoice_date,#dueDate' ).datepicker( 'setDate', today );


// Search Product
	$("#SearchProductTable tr").dblclick(function(e){
		
		var CurObj = $(this).closest("tr");
		$(MyLocation).closest("tr").find("#product_id").val($(CurObj).find("#product_id").val());
		$(MyLocation).closest("tr").find("#product_name").val($(CurObj).find('td').eq(1).text());
		$(MyLocation).closest("tr").find("#price").val($(CurObj).find('td').eq(2).text()); 
		$(MyLocation).closest("tr").find("#tax_rate").val($(CurObj).find('td').eq(5).text()); 
		//$(MyLocation).closest("tr").find("#discount_rate").val($(CurObj).find('td').eq(6).text());
		$("#searchitem").modal('hide'); 
	});

	function searchbtn(obj){
		MyLocation = obj;
		$("#item_detail").find('tr').each(function(index,value){
			$(value).closest('tr').attr('edited',false);
		});
		$(obj).closest('tr').attr('edited',true);
	}
	var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
	format: 'yyyy-mm-dd',
	todayHighlight: true,
	orientation: 'bottom right',
	autoclose: true,
	container: '#pdate'
	};
	$('#updated_date' ).datepicker( optSimple );
	$('#updated_date').datepicker( 'setDate', today );
	
	//Shipping Address
	$("#add_shipping").on("click",function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		debugger
		var client_id = $("#client_id").val();
		var invoice_id = $("#id").val();
		var ship_name = $("#ship_name").val();
		var ship_email = $("#ship_email").val();
		var ship_address = $("#ship_address").val();
		$.ajax({
			type: "POST",
			url : "shippingAddress",
			dataType:"json",
			data:{
				_token: CSRF_TOKEN,
				client_id : client_id,
				invoice_id : invoice_id,
				ship_name : ship_name,
				ship_email : ship_email,
				ship_address : ship_address
			},
			success :function(Customer){
				$("#shipping_add").modal('hide');
			}
		});
	});


//Shiping Detail 
  $("#customCheck").click(function(){
        if(this.checked) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            debugger
            var id = $("#client_id").val();
            $.ajax({
                type : "GET",
                url : 'shippingDetail/'+id,
                dataType :"json", 
                success:function(data){
                    let shippingDetail = '<div class="clientinfo" >'+
                                '<strong id="s_name">'+data[0].name_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong id="s_address">'+data[0].address_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong id="s_city">'+data[0].city_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong id="s_country">'+data[0].country_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Phone:</span>'+
                               '<strong id="s_phone">'+data[0].phone_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Email:</span>'+
                               '<strong id="s_email">'+data[0].email_s+'</strong>'+
                            '</div>';
                    $("#client_info").html(shippingDetail);
                    $("#client_inforight").html( shippingDetail);
                }
            });
        }
        else{
            $("#client_inforight").html('');
        }
    });
// Invoice Overview
$("#invocie_overview").click(function(){
	$("#cus_name").html($("#c_name").val());
	$("#cus_city").html($("#c_city").text());
	$("#cus_address").html($("#c_address").text());
	$("#cus_country").html($("#c_country").text());
	$("#cus_phone").html($("#c_phone").text());
	$("#cus_email").html($("#c_email").text());
	$("#inv_no").html($("#invoice_no").val());
	$("#ref_no").html($("#refer_no").val());
	$("#inv_date").html($("#invoice_date").val());
	$("#inv_duedate").html($("#dueDate").val());
	$("#ship_name").html($("#s_name").text());
	$("#ship_city").html($("#s_city").text());
	$("#ship_address").html($("#s_address").text());
	$("#ship_country").html($("#s_country").text());
	$("#ship_phone").html($("#s_phone").text());
	$("#ship_email").html($("#s_email").text());
	$("#total").val($("#grand_total").val());
	$("#inv_note").val($("#invoice_note").val());
	$("#pro_name").html($(".product_name").val());
	$("#pro_qty").html($(".qty").val());
	$("#pro_rate").html($(".price").val());
	$("#pro_tax").html($(".tax_rate").val());
	$("#pro_texs").html($("#product_tax").val());
	$("#pro_dis").html($(".discount_rate").val());
	$("#pro_amount").html($(".totalAmount").val());
	$("#sub_tot").val($("#sub_total").val());
	$("#total_ta").val($("#total_tax").val());
	$("#total_dis").val($("#total_discount").val());
	$("#total_ship").val($("#shipping").val());
	$("#date").val($("#invoice_date").val());
});

