<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'zenrolle_warehouse';
    protected $fillable = ['warehouse_name','warehouse_desc','bussines_loc'];
     protected $hidden = [
        'password', 'remember_token',
    ];
}
