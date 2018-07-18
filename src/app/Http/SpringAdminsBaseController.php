<?php

namespace SpringCms\SpringAdmins\App\Http;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class SpringAdminsBaseController extends Controller
{
     protected $_packageTag = 'springadmins'; 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:springadmins');
    }
    
}
