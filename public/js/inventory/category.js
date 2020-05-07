$(document).ready(function(){
	var counter = 1;
	$("#sub_category").on("click",function(){
		var newRow =$("#subCategory");
		var cols ='';
		cols +='<td><input type="text" class="form-control">'
		cols += '<td><input type="button" class="delete_row btn btn-md btn-danger" value="X"></td>';
		  newRow.append(cols);
        $("#subCategory").append(newRow);
        counter++;
	});
	$("#subCategory").on("click", ".delete_row", function (event) {
        $(this).closest("#subCategory").remove();       
        counter -= 1;
    });
});