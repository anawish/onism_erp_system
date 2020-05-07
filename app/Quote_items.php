<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote_items extends Model
{
    protected $table = 'zenrolle_quote_items';
    protected $fillable = ['pid','product_id','product_name','code','qty','status','price','price_type','tax','total_tax','discount','total_amount','product_desc'];
}
