<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'zenrolle_invoice_items';
    protected $fillable = ['pid','product_id','product_name','code','qty','status','price','price_type','tax','total_tax','discount','total_amount','product_desc'];
}
