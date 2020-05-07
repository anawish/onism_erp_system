<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'zenrolle_account';
    protected $fillable = ['id','gl_no','name','description','account_type','closing_bla'];
}
