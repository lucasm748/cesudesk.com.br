<?php

namespace App\Cesudesk\Usuario;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Cesudesk\Usuario\UsuarioService;
use App\Cesudesk\Usuario\UsuarioServiceContract;

use App\Cesudesk\Usuario\UsuarioRepository;
use App\Cesudesk\Usuario\UsuarioRepositoryContract;


class UsuarioServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Cesudesk\Usuario';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }
    public function register()
    {
        $this->app->bind(UsuarioServiceContract::class,UsuarioService::class);
        $this->app->bind(UsuarioRepositoryContract::class,UsuarioRepository::class);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
       $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Cesudesk/Usuario/routes.php');
        });

    }
}
