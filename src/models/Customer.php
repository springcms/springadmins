<?php

namespace SpringCms\SpringAdmins\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{

    /**
     * Get the comments for the blog post.
     */
    public function cus_informations()
    {
        return $this->hasMany('SpringCms\SpringAdmins\Models\CusInformation', 'cus_id');
    }

    public function cus_accounts()
    {
        return $this->hasMany('SpringCms\SpringAdmins\Models\CusAccount', 'cus_id');
    }

}
