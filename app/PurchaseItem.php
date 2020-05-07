<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $table = 'purchase_items';
    protected $fillable = ['pid','product_id','product_name','product_code','qty','price','tax','total_tax','discount','ammount','product_desc','balance_qty','invoice_no'];
}
