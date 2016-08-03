<?php

namespace App\Cesudesk\Equipe;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Cesudesk\Equipe\EquipeService;
use App\Cesudesk\Equipe\EquipeServiceContract;

use App\Cesudesk\Equipe\EquipeRepository;
use App\Cesudesk\Equipe\EquipeRepositoryContract;


class EquipeServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Cesudesk\Equipe';

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
        $this->app->bind(EquipeServiceContract::class,EquipeService::class);
        $this->app->bind(EquipeRepositoryContract::class,EquipeRepository::class);
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
            require app_path('Cesudesk/Equipe/routes.php');
        });

    }
}
