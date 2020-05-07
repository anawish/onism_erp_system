<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'zenrolle_purcahse';
    protected $fillable = ['company_id','emp_id','supplier_id','invoice_no','reference_no','order_date','due_date','warehouse','tax','discount','invoice_note','subtotal','total_tax','total_discount','shipping','pyterm','total','status','duepayment','payment_made','payment_method','account'];
    public function purchase_items(){
    	return $this->hasMany('App\PurchaseItem');
    }
    public static function updateData($id,$data){
      	DB::table('zenrolle_purcahse')->where('id', $id)->update($data);
   	}
   public function pur_history()
   {
   		return $this->hasMany(pur_history::class);
   }
}
