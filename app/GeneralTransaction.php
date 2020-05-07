<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralTransaction extends Model
{
    protected $table = 'zenrolle__general_transaction';
    protected $fillable = ['id','transaction_type','doc_date','posting_date','doc_no','net_balance'];
}
