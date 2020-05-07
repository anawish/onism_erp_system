<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'zenrolle_suppliers';
    protected $fillable = ['name','phone','email','address','city','region','country','postbox','taxtid'];
}
