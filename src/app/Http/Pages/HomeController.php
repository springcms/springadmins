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
    public function index()
    {  

    

        // // Reset cached roles and permissions
        //     app()['cache']->forget('spatie.permission.cache');

        //     // create permissions
        //     Permission::create(['name' => 'edit articles']);       
        //     Permission::create(['name' => 'delete articles']);
        //     Permission::create(['name' => 'publish articles']);
        //     Permission::create(['name' => 'unpublish articles']);

        //     // create roles and assign created permissions

        //     $role = Role::create(['name' => 'Operator']);
        //     $role->givePermissionTo('edit articles');

        //     $role = Role::create(['name' => 'moderator']);
        //     $role->givePermissionTo(['publish articles', 'unpublish articles']);

        //     $role = Role::create(['name' => 'super-admin']);
        //     $role->givePermissionTo(Permission::all());



        // $menu = $springadmins->menu();
//        dd($menu);
        // app()['cache']->forget('spatie.permission.cache');
        // $user = Auth::user();
      
        // dd($user);
        //  $role=Role::findById(2,'springadmins');
        //  $role->givePermissionTo(2);
        //     //$permission->assignRole($role);

        // dump($user->can('edit users admin'));
        //  $user->assignRole('quatri');
        //  $permissions = $user->permissions;
        //  dd($permissions);
        //     $role = Role::create(['name' => 'quatri']);
        //     $permission = Permission::create(['name' => 'edit users quantri']);

           
        
       return view('springadmins::pages.home');
    }
}
