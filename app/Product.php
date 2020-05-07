<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'zenrolle_produts';
    protected $fillable = ['product_name','product_code','retail_price','wholsale_price','tax_rate','discount_rate','qty','alert_qty','barcode','product_desc','emp_bouns','image','unit','description','sold'];

    public function zenrolle_product_sub_category(){
    	return $this->belongsTo('App\Add_Product_Category','category_id');
    }
    public function zenrolle_warehouse(){
    	return $this->belongsTo('App\WarehouseController','id');
    }
    public function delete_user($id){
    	$data = zenrolle_produts::findOrFail($id)->destroy();
    	if($data == TRUE){
    		return $data;
    	}
    	else{
    		echo "Fail";
    	}
    }
   
}
