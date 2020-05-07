<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GRNDetail extends Model
{
	protected $table = 'zenrolle_grn_detail';
	protected $fillable = ['id','grn_id','product_id','product_name','product_code','order_qty','receive_qty','unit','comments','grn_no'];
    public function grn()
    {
    	return $this->belongsTo(GRN::class);
    }
}
