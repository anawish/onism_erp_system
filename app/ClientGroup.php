<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    protected $table = 'zenrolle_cust_group';
    protected $fillable = ['id','title','summary'];
}
