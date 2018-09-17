# springadmins
admin
routeMiddleware

'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        
        
class Handler extends ExceptionHandler
add : 
$class = get_class($exception);

        switch ($class) {
            case 'Illuminate\Auth\AuthenticationException':
                $guard = array_get($exception->guards(), 0);
                switch ($guard) {
                    case 'springadmins':
                        $login = 'springadmins.login';
                        break;
                    default:
                        $login = 'login';
                        break;
                }

                return redirect()->route($login);
        }
        
     php artisan vendor:publish --tag=springassets
