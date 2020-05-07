$(document).ready(function () {
    window.MyLib = {}; 
    var counter = 1;
    $("#addrow").on("click", function (){
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><div class="input-group"><input type="text" name="product_name[]" id="product_name" class="form-control-sm form-control" onkeypress="SearchProduct(this)"><input type="hidden" name="product_id[]" id="product_id" class="form-control product_id"><div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-search-plus searchbtn" onclick="searchbtn(this)"  data-toggle="modal" data-target="#searchitem"></i></div></div></div><ul class="product_det"></ul></td>';
        cols += '<td><input type="text" name="qty[]" id="qty" class="form-control-sm form-control" onchange="qty_calculate(this)"></td>';
        cols += '<td class="d-none"><input type="hidden" name="receive_qty"required id="receive_qty" class="receive_qty"></td>';
        cols += '<td><input type="text" name="price[]" id="price" required class="form-control-sm form-control" readonly onchange="qty_calculate(this)"></td>';
        cols += '<td><input type="text" name="code[]" id="code" class="form-control-sm form-control" readonly></td>';
        cols += '<td><input type="text" name="unit[]" id="unit" class="form-control-sm form-control" readonly></td>';
        cols += '<td><input type="text" name="amount[]" id="amount" readonly class="form-control-sm form-control form-control-plaintext"></td>';
        cols += '<td><input type="button" class="delete_row btn btn-md btn-danger" value="X"></td>';
        newRow.append(cols);
        $("#item_detail").append(newRow);
        counter++;
    });
    $("#item_detail").on("click", ".delete_row", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1;
        total();
    });
});
// Client Detail
$('.ClientDetail tr').dblclick(function(e){
    debugger
    var name ='';
    var address = '';
    var city = '';
    var country = '';
    var email = '';
    var phone = '';
    $(this).find('td').each (function(index, value) {
        debugger
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
    });  
        $("#customerInfo").html(
                        '<div class="clientinfo">'+
                            '<input type="hidden" id="client_id" name="client_id" required value="'+$client_id+'">'+
                        '</div>'+
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
                        '</div>'
                    );
        $('.supplierDetail tr').removeClass('highlighted');
        $(this).addClass('highlighted');
        $("#mymodal").modal('hide');
        // $checkid = $("#client_id").val();
        // if($checkid > 0){
            
        // }
    });

/// Shipment Details
    $("#customCheck").click(function(){
        if(this.checked) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            var id = $("#client_id").val();
            $.ajax({
                type : "GET",
                url : 'order/'+id,
                dataType :"json", 
                success:function(data){
                    let shippingDetail = '<div class="clientinfo" >'+
                                '<strong>'+data[0].name_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong>'+data[0].address_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong>'+data[0].city_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<strong>'+data[0].country_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Phone:</span>'+
                               '<strong>'+data[0].phone_s+'</strong>'+
                            '</div>'+
                            '<div class="clientinfo">'+
                                '<span style="font-size:15px;font-family:sans-serif;color:#2f2d2d !important;">Email:</span>'+
                               '<strong>'+data[0].email_s+'</strong>'+
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

// Search Product
    function SearchProduct(obj){
        debugger
        $(obj).closest('tr').find(".product_det").show();
        var pname = $(obj).val();
        $(obj).closest('tr').find("ul").empty();
        $.ajax({
            type:"GET",
            url:'item/'+ pname,
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
        debugger
        $.ajax({
            type:"GET",
            url:'itemdetail/'+id,
            dataType:"json",
            success:function(data){
                $(obj).closest('tr').find('#product_id').val(data[0].id);
                $(obj).closest('tr').find('#product_name').val(data[0].product_name);
                $(obj).closest('tr').find("#price").val(data[0].retail_price);
                $(obj).closest('tr').find("#receive_qty").val(data[0].receive_qty);
                $(obj).closest('tr').find("#code").val(data[0].product_code);
                $(obj).closest('tr').find("#unit").val(data[0].unit);
                // $(obj).closest('tr').find("#qty").val(data[0].receive_qty);
                //$(obj).closest('tr').find("#tax_rate").val(data[0].tax_rate);
                // var discount_rate = $(obj).closest('tr').find("#discount_rate").val(data[0].discount_rate);
            }
        });
        $(obj).closest('tr').find(".product_det").hide();
    }
/// Calculation
    $('#shipping').keyup(function(){
        var shipping = $(this).val()-0;
        var subtotal = $('#sub_total').val();
        var grandTotal = parseFloat(subtotal)+parseFloat(shipping);
        $('#totalamount').val(grandTotal);
    });
function qty_calculate(obj){
    debugger
    var AvailableQty = parseFloat($(obj).closest('tr').find("#receive_qty").val());
    var CurQTY = parseFloat($(obj).closest('tr').find("#qty").val());
    var price  = parseFloat($(obj).closest('tr').find("#price").val());
    var shipping = $("#shipping").val();
    var TotalAmount  = price * CurQTY;
    var subTotal = 0;
    var GrandTotal = 0;
        $(obj).closest('tr').find("#amount").val(TotalAmount);
        $("#item_detail > tr").each(function(){
                subTotal = subTotal + parseFloat($(this).find("#amount").val());
        });
        var GrandTotal = shipping + subTotal;
        $("#sub_total").val(subTotal);
        $("#totalamount").val(GrandTotal);
}

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
    $( '#order_date').datepicker( optSimple );
    $('#delivery_date').datepicker( optComponent )
    $( '#order_date, #delivery_date').datepicker( 'setDate', today );


/// Serach Product
   
$("#SearchProductTable tr").dblclick(function (e){
    debugger
    var CurObj = $(this).closest('tr');
    $(MyLib).closest("tr").find("#product_id").val($(CurObj).find("#product_id").val());
    $(MyLib).closest("tr").find("#product_name").val($(CurObj).find('td').eq(1).text());
    $(MyLib).closest("tr").find("#price").val($(CurObj).find('td').eq(2).text());
    $(MyLib).closest("tr").find("#code").val($(CurObj).find('td').eq(3).text());
    $(MyLib).closest("tr").find("#unit").val($(CurObj).find('td').eq(4).text());
    $("#searchitem").modal('hide');
          

});
    
function searchbtn(obj)
{
    MyLib = obj;
    $("#item_detail").find('tr').each(function(index,value){
      $(value).closest('tr').attr('edited',false);
    });
    $(obj).closest('tr').attr('edited',true);
}