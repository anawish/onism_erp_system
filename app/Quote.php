<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'zenrolle_quote';
    protected $fillable = ['company_id','invoice_no','invoicedate','invoice_duedate','refer_no','csid','warehouse_id','tax','discount','total_tax','shipping','sub_total','total','invoice_note','proposal','status','total_discount','empid','pmethod','payment','p_blance','terms'];
}
