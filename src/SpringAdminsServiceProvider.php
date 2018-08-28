<?php

namespace SpringCms\SpringAdmins;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Container\Container;
use SpringCms\SpringAdmins\Events\BuildingMenu;
use SpringCms\SpringAdmins\App\ViewComposers\SpringAdminsComposer;


class SpringAdminsServiceProvider extends BaseServiceProvider
{
    
    private $_packageTag = 'springadmins';

    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $view,  Dispatcher $events, Repository $config) 
    {
        //
        $this->publishConfig(); 
        $this->loadViews();
        $this->loadRoutes();       
        $this->loadMigrations();
        $this->loadTranslations();
        $this->publishAssets();
        // $router->middleware('admin', 'SpringCms\AdminAuth\App\Http\Middleware\AdminAuthenticate');


        $this->registerViewComposers($view);

        static::registerMenu($events, $config);


 
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SpringAdmins::class, function (Container $app) {
            return new SpringAdmins(
                $app['config']['springadmins.filters'],
                $app['events'],
                $app
            );
        });

    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('springadmins::layouts.page', SpringAdminsComposer::class);
    }

    public static function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('springadmins.menu');            
            call_user_func_array([$event->menu, 'add'], $menu);
        });
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views'); 
        $this->loadViewsFrom($viewsPath, $this->_packageTag);

    }
    private function publishConfig()
    {
        $configPath = $this->packagePath('config/auth.php');
        $this->mergeConfigFrom($configPath, 'auth');
        //$configPath = $this->packagePath('config/adminlte.php');
        //$this->mergeConfigFrom($configPath, 'adminlte');
        $configPath = $this->packagePath('config/springadmins.php');       
        $this->mergeConfigFrom($configPath, $this->_packageTag);
    }
    private function loadMigrations()
    {
        $viewsPath = $this->packagePath('migrations'); 
        $this->loadMigrationsFrom($viewsPath, $this->_packageTag);
    }
    private function loadRoutes()
    {
       $routesPath = $this->packagePath('src/routes/springadmins.php'); 
       $this->loadRoutesFrom($routesPath, $this->_packageTag);
    }
    private function loadTranslations()
    {
      $resourcesPath = $this->packagePath('resources/lang');
      $this->loadTranslationsFrom( $resourcesPath,$this->_packageTag);
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('vendor/almasaeed2010/adminlte') => public_path('vendor/springadmins'),
        ], 'springassets');
    }

    private function packagePath($path)
    {
        return __DIR__."/../$path";
    }



    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, array_merge_recursive(require $path, $config));
    }

    
}
