$(document).ready(function(){
	// Add New Row
	window.MyLocation = {}; 
	var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr  class='autonumber'>");

 		var cols = "";
 		cols +='<td></td>';
        cols += '<td><div class="input-group"><input type="hidden" name="gl_id[]" id="gl_id"><input type="text" name="gl_no[]" id="gl_no" class="form-control form-control-sm" required readonly><div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-search-plus" data-toggle="modal" data-target="#accountsearch" onclick="searchbtn(this)"></i></div></div></div></td>';
        cols += '<td><input type="text" name="gl_name[]" id="gl_name" class="form-control form-control-sm" readonly></td>';
        cols += '<td><input type="text" name="gl_des[]" id="gl_des" class="form-control form-control-sm" readonly></td>';
        cols += '<td><input type="text" name="debit[]" id="debit" class="form-control form-control-sm debit" value="0.00" onchange="cal_debit_credit(this)"></td>';
        cols += '<td><input type="text" name="credit[]" id="credit" class="form-control form-control-sm" value="0.00" onchange="cal_debit_credit(this)"></td>';
        cols += '<td><input type="button" class="delete_row btn btn-sm btn-danger" value="X"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on("click", ".delete_row", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1;
    });
    // End Row

	// Date Picker
	var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var optSimple = {
	format: 'yy-mm-dd',
	todayHighlight: true,
	orientation: 'bottom right',
	autoclose: true,
	container: '#current_Date'
	};
	var optComponent = {
	  format: 'yy-mm-dd',
	  container: '#due_date',
	  orientation: 'bottom right',
	  todayHighlight: true,
	  autoclose: true
	};
	$('#doc_date' ).datepicker( optSimple );
	$('#posting_date').datepicker( optComponent )
	$( '#doc_date,#posting_date' ).datepicker( 'setDate', today );

});

    // Add Account Detail
	$(".account_detail tr").dblclick(function(e){
		debugger
		var CurObj = $(this).closest("tr");
		$(MyLocation).closest("tr").find("#gl_id").val($(CurObj).find("#gl_id").val());
		$(MyLocation).closest("tr").find("#gl_no").val($(CurObj).find('td').eq(1).text());
		$(MyLocation).closest("tr").find("#gl_name").val($(CurObj).find('td').eq(2).text());
		$(MyLocation).closest("tr").find("#gl_des").val($(CurObj).find('td').eq(3).text()); 
		$("#accountsearch").modal('hide'); 

	});
	function searchbtn(obj){
		debugger
		MyLocation = obj;
		$("#gl_detail").find('tr').each(function(index,value){
			$(value).closest('tr').attr('edited',false);
		});
		$(obj).closest('tr').attr('edited',true);
	}
// Transaction Type
$("#trans_type").on("change",function(){
	var trans_type = $("#trans_type").val();
		if($("#trans_type").val() == 'BP'){
			$(".cheq_no_detail").html('<label>Cheq No.</label>'+
							'<div class="input-group">'+
								'<input type="text" name="cheq_no" class="form-control form-control-sm">'+
							'</div>');
		}
		else if($("#trans_type").val() == 'BR'){

			$(".cheq_no_detail").html('<label>Cheq No.</label>'+
							'<div class="input-group">'+
								'<input type="text" name="cheq_no" class="form-control form-control-sm">'+
							'</div>');
		}
		else{
			$("#cheq_no_detail").hide();
		}
});
//Calculate Debit And Credit
function cal_debit_credit(obj){
	debugger
	var debit = parseFloat($(obj).closest('tr').find("#debit").val());
	var credit = parseFloat($(obj).closest('tr').find("#credit").val());
	var sum_debit = 0;
	var sum_credit = 0;
	var total_balance = 0;
		$("#gl_detail > tr").each(function(){
			sum_debit = sum_debit + parseFloat($(this).find("#debit").val());
			sum_credit = sum_credit +parseFloat($(this).find("#credit").val());
			total_balance = sum_debit-sum_credit;
		});
		$("#total_debit").val(sum_debit);
		$("#total_credit").val(sum_credit);
		$("#net_balance").val(total_balance);
}

// Preview 
$("#pre_view").click(function(){
	debugger
	var trans_type = $("#trans_type").val();
	var doc_date  = $("#doc_date").val();
	var posting_date = $("#posting_date").val();
	var net_balance = $("#net_balance").val();
	var description = $("#description").val();
	var gl_no = $("#gl_no").val();
	var name = $("#gl_name").val();
	var des = $("#gl_des").val();
	var debit = $("#debit").val();
	var credit = $("#credit").val();
	var total_debit = $("#total_debit").val();
	var total_credit = $("#total_credit").val();
	// $('#myTable').find("").each(function() {
 //    var gl_no = $("#gl_no").val();
	// alert(gl_no);

 //    });
	$("#trans").val(trans_type);
	$("#doc_date").val(doc_date);
	$("#posting_date").val(posting_date);
	$("#net_balances").val(net_balance);
	$("#Narration").val(description);
	$("#no").val(gl_no);
	
	$("#name").val(name);
	$("#des").val(des);
	$("#gl_debit").val(debit);
	$("#gl_credit").val(credit);
	$("#total_debits").val(total_debit);
	$("#total_credits").val(total_credit);
});
