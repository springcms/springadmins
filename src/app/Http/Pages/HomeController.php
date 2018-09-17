<?php

namespace SpringCms\SpringAdmins\App\Http\Pages;

use SpringCms\SpringAdmins\App\Http\SpringAdminsBaseController;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SpringCms\SpringAdmins\SpringAdmins;
use Illuminate\Contracts\Config\Repository;
use SpringCms\SpringAdmins\App\ViewComposers\SpringAdminsComposer;

use App\Mail\SpringMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use SpringCms\SpringAdmins\Models\SystemUser;
use SpringCms\SpringAdmins\Traits\Authorizable;



class HomeController extends SpringAdminsBaseController
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  

        $this->authorize($ability);
        

        $sendmail = Input::get('sendmail');   
        //$sendmail = $request->input('sendmail');       
        if($sendmail=='send'){
            $objDemo = new \stdClass();
            $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';
    
            $result = Mail::to("hoantx@vimo.vn")->send(new SpringMail($objDemo));
            dd($result);
        }
        

            // // Reset cached roles and permissions
            //    app()['cache']->forget('spatie.permission.cache');

            // // create permissions
            // Permission::create(['name' => 'edit customers']);       
            // Permission::create(['name' => 'delete customers']);
            // Permission::create(['name' => 'publish customers']);
            // Permission::create(['name' => 'unpublish customers']);

            // create roles and assign created permissions

           // $role = Role::create(['name' => 'operator']);
            // $role = Role::findByName('operator');
            // $role->givePermissionTo('edit customers');

            // $role = Role::create(['name' => 'moderator']);
            // $role->givePermissionTo(['publish customers', 'unpublish customers']);

            // $role = Role::create(['name' => 'super-admin']);
            // $role->givePermissionTo(Permission::all());


        app()['cache']->forget('spatie.permission.cache');
        $user = Auth::user(); 
        echo \Request::route()->getname();    
        //Permission::create(['name' => 'view customers']);
        $user->givePermissionTo('view customers');
        //$user->givePermissionTo(['edit customers', 'delete customers']);   
        dd($user->can("unpublish customers"));
        dd($user->hasRole(Role::findByName('moderator')));
        $user->assignRole('moderator');
        dd($user->hasRole(Role::findByName('moderator')));
        dd($user);
         $role=Role::findById(2,'springadmins');
         $role->givePermissionTo(2);
            //$permission->assignRole($role);

        dump($user->can('edit users admin'));
         $user->assignRole('quatri');
         $permissions = $user->permissions;
         dd($permissions);
            $role = Role::create(['name' => 'quatri']);
            $permission = Permission::create(['name' => 'edit users quantri']);

           
        
       return view('springadmins::pages.home');
    }
}
