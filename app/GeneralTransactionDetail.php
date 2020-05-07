<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralTransactionDetail extends Model
{
    protected $table = 'zenrolle__general_transaction_detail';
    protected $fillable = ['id','pid','gl_id','gl_no','name','description','debit','credit'];
}
