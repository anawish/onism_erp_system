<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pur_history extends Model
{
	protected $table = 'zenrolle__pur_history';
	protected $fillable = ['id','po_id','payment','debit','credit','closing_balance','payment_method','type','payment_note','updated_date','vendor_id'];
   	public function PurchaseOrder()
   	{
   		return $this->belongsTo(PurchaseOrder::class);
   	}
}
