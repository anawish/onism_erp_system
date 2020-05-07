<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddSupplier extends Model
{
    protected $table = 'zenrolle_suppliers';
    protected $fillable = ['name','phone','address','city','region','country','postbox','picture','taxid'];
}
