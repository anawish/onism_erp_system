$("#customCheck").change(function() {
    if(this.checked) {
       let name = $("#mcustomer_name").val();
       var mcustomer_phone = $("#mcustomer_phone").val();
       var mcustomer_email = $("#mcustomer_email").val();
       var mcustomer_address = $("#mcustomer_address").val(); 
       var mcustomer_city = $("#mcustomer_city").val();
       var mcustomer_country = $("#mcustomer_country").val();
       var region = $("#region").val();
       var mcustomer_country = $("#mcustomer_country").val();
       var postbox = $("#postbox").val();

       $("#name_s").val(name);
       $("#phone_s").val(mcustomer_phone);
       $("#email_s").val(mcustomer_email);
       $("#address_s").val(mcustomer_address);
       $("#city_s").val(mcustomer_city);
       $("#region_s").val(region);
       $("#country_s").val(mcustomer_country);
       $("#postbox_s").val(postbox);

    }
    else{
    	$("#name_s").val('');
    	$("#phone_s").val('');
    	$("#email_s").val('');
    	$("#address_s").val('');
    	$("#city_s").val('');
    	$("#region_s").val('');
    	$("#country_s").val('');
    	$("#postbox_s").val('');
    }
});