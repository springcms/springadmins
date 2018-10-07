<?php

namespace SpringCms\SpringAdmins\App\Http\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;
use SpringCms\SpringAdmins\App\Exceptions\SpringAdminsExc;
use SpringCms\SpringAdmins\Models\SystemUser;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'springadmins/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function guard()
    {
        return Auth::guard('springadmins');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'loginname';
    }


    public function showlogin($value='')
    {      
        //$user = SystemUser::find(1);
        //dd($user);
        $user = new SystemUser(array('fullname' => 'john mackane','loginname'=>'apiname'));
        $user->password = Hash::make('432424') ;
        $user->save();
        $checklogin = Auth::guard('springadmins')->login($user);
        //dd($checklogin);
        return view('springadmins::pages.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('springadmins')->logout();

        $request->session()->invalidate();
        return redirect('/springadmins/login');
    }

    
}
