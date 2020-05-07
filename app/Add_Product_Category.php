<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Product_Category extends Model
{
	protected $table = 'zenrolle_product_categories';
	
    protected $fillable = ['category_name','category_desc','bussines_loc'];

    public function zenrolle_product_categories(){
    	return $this->hasMany('App\SubCategory');
    }
    
}
