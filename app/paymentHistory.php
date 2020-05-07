<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentHistory extends Model
{
    protected $table = 'zenrolle_payment_history';
    protected $fillable = ['id','gl_id','gl_no','gl_name','type','debit','credit','updated_date'];
}
