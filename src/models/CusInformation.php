<?php

namespace SpringCms\SpringAdmins\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SpringCms\SpringAdmins\Models\Customer;

class CusInformation extends Model
{     

    public function customer() {
        return $this->belongsTo(Customer::class,'cus_id','id');
    }

}
