$(document).ready(function(){
$(function(){
      $("#create_account").draggable({
        handle: ".modal-header"
        });
    });

  // Alert Message Time
  setTimeout(function() {$('#alert-box').remove();}, 2000); 
});

$("#gl_no").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
});

//// Date Filter
$('#range').click(function(){
  debugger
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var form_date = $('#form_date').val();
    var to_date = $('#to_date').val();
    if(form_date != '' && to_date != '')
    {
      $.ajax({
        type :"POST",
        url:"trialdate",
        dataType:"json",
        data:{
          _token: CSRF_TOKEN,
          form_date : form_date, 
          to_date : to_date
        },
        success:function(ddata)
        {
          $("tbody").html('');
          $("#TotalDebit").html('');
          $("#TotalCredit").html('');
          $("#closing_bal").html('');
         $.each( ddata['data'], function( key, data ) {
            $('tbody').append('<tr>'+
                        '<td>'+data.gl+'</td>'+
                        '<td>'+data.payment_method+'</td>'+
                        '<td>'+data.opening_bla+'</td>'+
                        '<td>'+data.debit+'</td>'+
                        '<td>'+data.payment+'</td>'+
                        '<td>'+data.closing_balance+'</td>'+
                        '<td>'+'<a href="" class="btn btn-info btn-sm">Edit</a>'+'</td>'+
                      '</tr>');
              
          });
          $("#TotalDebit").html(ddata['TotalDebit']);
          $("#TotalCredit").html(ddata['TotalCredit']);
          $("#closing_bal").html(ddata['closing_bal']);
      
        }
      });
    }
    else
    {
      alert("Please Select the Customer Number");
    }
  });
