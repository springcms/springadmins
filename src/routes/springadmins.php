<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\View;
//use SpringCms\SpringAdmins\models\Menu;

// if (Schema::hasTable('menus')) {
//     $menus = Menu::with('children')->where('menu_type', '!=', 0)->orderBy('position')->get();
//     View::share('menus', $menus);
//     if (! empty($menus)) {
//         Route::group([
//             'middleware' => ['web', 'auth', 'role'],
//             'prefix'     => config('springadmins.route'),
//             'as'         => config('springadmins.route') . '.',
//             'namespace'  => 'App\Http\Controllers',
//         ], function () use ($menus) {
//             foreach ($menus as $menu) {
//                 switch ($menu->menu_type) {
//                     case 1:
//                         Route::post(strtolower($menu->name) . '/massDelete', [
//                             'as'   => strtolower($menu->name) . '.massDelete',
//                             'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@massDelete'
//                         ]);
//                         Route::resource(strtolower($menu->name),
//                             'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller', ['except' => 'show']);
//                         break;
//                     case 3:
//                         Route::get(strtolower($menu->name), [
//                             'as'   => strtolower($menu->name) . '.index',
//                             'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@index',
//                         ]);
//                         break;
//                 }
//             }
//         });
//     }
// }


Route::middleware(['web'])->prefix('springadmins')->group(function () {
    Route::get('/home', 'SpringCms\SpringAdmins\App\Http\Pages\HomeController@index')->name('springadmins.home'); 
    // Route::get('/users-admin', 'SpringCms\SpringAdmins\App\Http\Admins\UsersAdminController@index')->name('springadmins.springadmins-users'); 

    Route::get('/login', 'SpringCms\SpringAdmins\App\Http\Pages\LoginController@showlogin')->name('springadmins.showlogin');
    Route::post('/login', 'SpringCms\SpringAdmins\App\Http\Pages\LoginController@login')->name('springadmins.login');
    Route::post('/logout', 'SpringCms\SpringAdmins\App\Http\Pages\LoginController@logout')->name('springadmins.logout');
});
    

Route::get('/springadmins', function () {
   echo "Spring admin comeback myself";
});

// APP Routes Below
Route::group(['middleware' => 'web','prefix'=>'springadmins', 'namespace' => 'SpringCms\SpringAdmins\App\Http\Resources'], function () {
    Route::resource('system-users', 'SystemUsersController', [
        'names' => [
            'index'   => 'system-users',
            //'destroy' => 'user-admin.destroy',
        ],
    ]);
    Route::resource('system-menus', 'SystemMenusController', [
        'names' => [
            'index'   => 'system-menus',
            //'destroy' => 'user-admin.destroy',
        ],
    ]);
    Route::resource('customers', 'CustomersController', [
        'names' => [
            'index'   => 'customers',
            //'destroy' => 'user-admin.destroy',
        ],
    ]);
});
