<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    protected $table = 'zenrolle_cust_group';
    protected $fillable = ['title','summary'];
}
