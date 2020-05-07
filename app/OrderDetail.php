<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'zenrolle_saleorder_detail';
    protected $fillable = ['id','pid','product_id','product_name','qty','price','code','unit','amount'];
}
