<?php

namespace SpringCms\SpringAdmins\App\Exceptions;

use Exception;
//use SpringCms\SpringAdmins\App\Exceptions\AuthExc;


class SpringAdminsUnAuth extends Exception
{
    public function __construct($guards)
    {        
        $this->message = sprintf("You don't have the permission.");
        return redirect()->guest(route('springadmins.showlogin'));
    }
}
