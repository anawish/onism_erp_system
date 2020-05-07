<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewInvoice extends Model
{
    protected $table = 'zenrolle_invoicess';
    protected $fillable = ['company_id','invoice_no','invoicedate','invoice_duedate','refer_no','csid','warehouse_id','tax','discount','total_tax','shipping','sub_total','grand_total','invoice_note','status','account_type','empid','pmethod','payment','p_blance','terms','total_discount','update_date','sale_no'];
}
