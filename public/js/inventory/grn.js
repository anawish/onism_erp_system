$(document).ready(function(){

    // Add New Row
    var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");

        var cols = "";

        cols += '<td><input type="text" class="form-control product_name" id="product_name"required="" name="product_name[]" onkeypress="SearchProduct(this)" value=""/><input type="hidden" name="product_id[]" id="product_id" class="form-control product_id" valule="1"><ul class="product_det"></ul></td>';
        cols += '<td><input type="text" class="form-control qty" id="qty" required="" name="qty[]"/></td>';
        cols += '<td><input type="text" class="form-control desc" id="desc" name="desc[]"/></td>';
        cols += '<td><input type="text" class="form-control unit" id="unit" name="unit[]"/></td>';
        cols += '<td><input type="text" class="form-control batch" id="batch" name="batch[]"/></td>';
        cols += '<td><input type="text" class="form-control naration" id="naration "name="naration[]"/></td>';
        cols += '<td><input type="button" class="delete_row btn btn-md btn-danger" value="Delete Row"></td>';
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


    //DOC Date
    var today = new Date();
    var dd = ("0" + (today.getDate())).slice(-2);
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var yyyy= today.getFullYear();
    today = yyyy + '-' +mm+ '-' +dd;
    $("#todays-date").attr("value",today);
    $("#posting_date").attr("value",today);

});

    //Search Product

    function SearchProduct(obj){
        
        $(obj).closest('tr').find(".product_det").show();
        debugger
        var SearchProd = $(obj).val();
        debugger

        $(obj).closest('tr').find("ul").empty();

        $.ajax({
            type:"GET",
            url:'grnproduct/'+SearchProd,
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

    // function productDetail(id, obj){

    //     $.ajax({
    //         type:"GET",
    //         url:'productDet/'+id,
    //         dataType:"json",
    //         success:function(data){
    //             $(obj).closest('tr').find('#product_id').val(data[0].id);
    //             var product_name = $(obj).closest('tr').find('#product_name').val(data[0].product_name);
    //             var price = $(obj).closest('tr').find("#desc").val(data[0].retail_price);
    //             var tax_rate = $(obj).closest('tr').find("#unit").val(data[0].tax_rate);
    //             var discount_rate = $(obj).closest('tr').find("#batch").val(data[0].discount_rate);

    //         }
    //     });

    //     $(obj).closest('tr').find(".product_det").hide();
    // }
 
 $('table').on('click','tr a',function(e){
    debugger
         e.preventDefault();
        $(this).parents('tr').remove();
      });
 


