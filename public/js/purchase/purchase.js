$(document).ready(function(){

	 window.MyLocation = {}; 
	// Add New Row
	var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");

        var cols = "";

        cols += '<td><div class="input-group"><input type="text" class="form-control form-control-sm product_name" id="product_name"required name="product_name[]" onkeypress="ProductSearch(this)"/><input type="hidden" name="product_id[]" id="product_id" class="form-control product_id"><input type="hidden" name="product_code[]" id="product_code" class="form-control product_code"><div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-search-plus searchbtn" onclick="searchbtn(this)"  data-toggle="modal" data-target="#searchitem"></i></div></div></div><ul class="product_det"></ul></td>';
        cols += '<td><input type="text" class="form-control form-control-sm qty" id="qty" required="" name="qty[]"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm price" readonly id="price" name="price[]"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm product_tax" id="product_tax" name="product_tax[]"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm pro_tax" id="pro_tax" readonly name="pro_tax[]"/></td>';
        cols += '<td style="display: none;"><input type="hidden" class="form-control prodcut_discount" id="prodcut_discount" name="prodcut_discount"/></td>';
        cols += '<td><input type="text" class="form-control form-control-sm ammount" readonly id="ammount "name="ammount[]"/></td>';
        cols += '<td><input type="button" class="delete_row btn btn-sm btn-danger" value="X"></td>';
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

//SEARCH SUPPLIER
	$('.supplierDetail tr').dblclick(function(e){
		debugger
		var name ='';
		var address = '';
		var city = '';
		var country = '';
		var email = '';
		var phone = '';
		var row =$(this).find('td').each (function(index, value) {
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
		  
		});  
		$("#supplier_info").html(
				        '<div class="clientinfo">'+
				            '<strong>'+$name+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong>'+$address+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				            '<strong>'+$city+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span class="_country">Country:</span>'+
				           '<strong>'+$country+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span class="_country">Phone:</span>'+
				           '<strong>'+$phone+'</strong>'+
				        '</div>'+
				        '<div class="clientinfo">'+
				        	'<span class="_country">Email:</span>'+
				           '<strong>'+$email+'</strong>'+
				        '</div>'
					);
		$('.supplierDetail tr').removeClass('highlighted');
		$(this).addClass('highlighted');
		$("#mymodal").modal('hide');
		
	})
	
	// Search Client

	$("#search_supplier").keyup(function(){
		debugger
		var query = $(this).val();
		$("#searchResult > ul").empty();
		debugger
		$.ajax({
			type:"GET",
			url :'purchaseorder/'+query,
			dataType:"json",
			success:function(data){
					$.each(data,function(key,value){
					debugger
					$("#searchResult > ul").append(
						'<li onclick="SupplierDetail('+value.id+')">'+
							'<p>'+value.name+'&nbsp &nbsp'+value.phone+'</p>'+
						'</li>'
		            );
				});
			}
		});
	});

	function SupplierDetail(id){
		debugger
		$("#searchResult > ul").empty();
			$.ajax({
			 	type:"GET",
			 	url:'SupplierDetail/'+id,
			 	dataType:"json",
			 	success:function(data){
			 		debugger
			 			$("#supplier_info").append(
							'<div class="clientinfo">'+
					            '<input type="hidden" name="supplier" id="supplier" value='+data[0].id+'>'+
					        '</div>'+
					        '<div class="clientinfo">'+
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

	//Search Product

	function ProductSearch(obj){
		
		$(obj).closest('tr').find(".product_det").show();
		var searchpro = $(obj).val();
		debugger

		$(obj).closest('tr').find("ul").empty();

		$.ajax({
			type:"GET",
			url:'productsearch/'+searchpro,
			dataType:"json",
			success:function(data){
				$.each(data,function(key,data){
					$(obj).closest('tr').find("ul").append(
						'<li onclick="productDetail('+data.id+', this)">'+
							'<p>'+data.product_name+'</p>'+
						'</li>'
					);
				})
			}
		})
	}

	function productDetail(id, obj){

		$.ajax({
			type:"GET",
			url:'productDet/'+id,
			dataType:"json",
			success:function(data){
				$(obj).closest('tr').find('#product_id').val(data[0].id);
				var product_name = $(obj).closest('tr').find('#product_name').val(data[0].product_name);
				var price = $(obj).closest('tr').find("#price").val(data[0].retail_price);
				var product_code = $(obj).closest('tr').find("#product_code").val(data[0].product_code);
				var tax_rate = $(obj).closest('tr').find("#product_tax").val(data[0].tax_rate);
				var discount_rate = $(obj).closest('tr').find("#product_discount").val(data[0].discount_rate);
			}
		});

		$(obj).closest('tr').find(".product_det").hide();
	}

	$('tbody').delegate('.qty, .price','keyup',function(){
		var tr = $(this).parent().parent();
		var qty = tr.find('.qty').val();
		var price = tr.find('.price').val();
		var pro_tax  = tr.find('.pro_tax').val();
		var product_tax = tr.find('.product_tax').val();
		var amount = (qty * price * product_tax/100);
		var ammount = (qty*price+amount);
		tr.find('.pro_tax').val(amount);
		tr.find('.ammount').val(ammount);

		total();
		count_tax();
	});
	
	function count_tax(){
		total_tax = 0;
		$('.pro_tax').each(function(i,e){
			var pro_tax = $(this).val()-0;
			total_tax +=pro_tax;

	});
		$('.total_tax').val(total_tax);
	}

	function total(){
		var total = 0;
		$('.ammount').each(function(i,e){
			var ammount = $(this).val()-0;
			total +=ammount;
		});

		$('.subtotal').val(total);
		$('.total').val(total);
	}

	$('#shipping').keyup(function(){

		var shipping = $(this).val()-0;
		var subtotal = $('#subtotal').val();
		var grandTotal = parseFloat(subtotal)+parseFloat(shipping);
		$('#total').val(grandTotal);

	});

	$("#change_status").on('click',function(){
       
		var status = $("#status").val();

		var id = $("#invoice_id").val();

		$.ajax({

           type:"POST",
           url:"changestatus",
           dataType: "json",
           data:{status:status, id:id},
           success:function(data){
              alert(data.success);
           }
        });


	});

	$("#doPayment").on('click', function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		debugger
		var payment_made = $("#payment_made").val();
		var updated_date = $("#updated_date").val();
		var payment_method = $("#payment_method").val();
		var account = $("#account").val();
		var payment_note = $("#payment_note").val();
		var invoice_no = $("#invoice_no").val();
		var vendor_id = $("#vendor_id").val();
		var id = $("#id").val();
		$.ajax({
			type:"POST",
			url:'makepayment',
			dataType:"json",
			data :{
				_token: CSRF_TOKEN,
				payment_made:payment_made,
				updated_date:updated_date,
				payment_method:payment_method,
				account:account,
				id:id,
				payment_note:payment_note,
				vendor_id:vendor_id
			},
			success:function(return_response){
				$("#paymade").html(return_response[0].payment_made);
				$("#payment_type").html(return_response[0].payment_method);
				$("#payment_status").html(return_response[0].status);
				$("#payment_model").modal('hide');
			}
		})
	});

//// Date Picker

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation: 'bottom right',
    autoclose: true,
    container: '#date_picker'
    };
    var optComponent = {
      format: 'yyyy-mm-dd',
      container: '#due_date',
      orientation: 'bottom right',
      todayHighlight: true,
      autoclose: true
    };
    $('#order_date').datepicker( optSimple );
    $('#delivery_date').datepicker( optComponent )
    $( '#order_date, #delivery_date').datepicker( 'setDate', today );


// SEARCH PRODUCT THROUGH MODAL
function searchbtn(obj){
	MyLocation  = obj;
	 $("#item_detail").find('tr').each(function(index,value){
      $(value).closest('tr').attr('edited',false);
    });
    $(obj).closest('tr').attr('edited',true);
}

$("#SearchProductTable tr").dblclick(function(e){
	var CurObj = $(this).closest('tr');
	$(MyLocation).closest('tr').find("#product_id").val($(CurObj).find("#product_id").val());
	$(MyLocation).closest('tr').find("#product_name").val($(CurObj).find('td').eq(1).text());
	$(MyLocation).closest('tr').find("#price").val($(CurObj).find('td').eq(2).text());
	$(MyLocation).closest('tr').find("#product_tax").val($(CurObj).find('td').eq(5).text());
	$("#searchitem").modal('hide'); 
});

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

