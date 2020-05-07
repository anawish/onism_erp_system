<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceHistory extends Model
{
    protected $table = 'invoice_history';
    protected $fillable = ['id','invoice_id','invoice_no','client_id','payment','payment_method','account_type','updated_date','debit','payment_note','type','sale_no','credit'];
}
