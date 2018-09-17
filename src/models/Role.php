<?php

namespace SpringCms\SpringAdmins\Models;
use Illuminate\Support\Facades\Auth;
class Role extends \Spatie\Permission\Models\Role {

    public static function isSuperAdmin()
    {
        return Auth::user()->hasanyrole('super-admin');        
    }
 } 
