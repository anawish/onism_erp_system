<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'zenrolle_customers';
    protected $fillable = ['name','company_id','phone','email','address','city','region','country','postbox','company','taxid','gid','name_s','phone_s','email_s','address_s','city_s','region_s','country_s','postbox_s','route_id','balance','picture','cust_no'];
    public function zenrolle_customers(){
    	return $this->belongsTo('App\companies','company_id');
    }
}
