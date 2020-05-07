<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	protected $table = 'zenrolle_product_sub_category';
	
    protected $fillable = ['category_id','sub_category'];

    public function zenrolle_product_sub_category(){
    	return $this->belongsTo('App\Add_Product_Category','category_id');
    }
}
