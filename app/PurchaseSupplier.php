<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseSupplier extends Model
{
    protected $table = 'zenrolle_suppliers';
    protected $fillable = ['name','phone','address','city','region','country','postbox','picture','taxid'];
}
