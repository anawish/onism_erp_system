<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GRN extends Model
{
	protected $table = 'zenrolle_grn';
	protected $fillable = ['id','grn_no','doc_date','posting_date','po_no','inward_gate','warehouse','delivery_note'];
    public function grndetails()
    {
    	return $this->hasMany(GRNDetails::class);
    }
}
