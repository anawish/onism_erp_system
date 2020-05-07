<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrders extends Model
{
    protected $table = 'zenrolle_saleorder';
    protected $fillable = ['id','company_id','order_no','po_no','qty_kg','qty_each','order_date','delivery_date','order_note','sub_total','shipping','total'];
}
