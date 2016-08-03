<?php

namespace App\Cesudesk\Modulo;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Cesudesk\Modulo\ModuloService;
use App\Cesudesk\Modulo\ModuloServiceContract;

use App\Cesudesk\Modulo\ModuloRepository;
use App\Cesudesk\Modulo\ModuloRepositoryContract;


class ModuloServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Cesudesk\Modulo';

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
        $this->app->bind(ModuloServiceContract::class,ModuloService::class);
        $this->app->bind(ModuloRepositoryContract::class,ModuloRepository::class);
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
            require app_path('Cesudesk/Modulo/routes.php');
        });

    }
}
