<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRoute extends Model
{
    protected $table = 'zenrolle_cust_route';
    protected $fillable = ['title','smmery'];
}
