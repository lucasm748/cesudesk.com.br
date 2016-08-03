<?php

namespace App\Cesudesk\Triagem;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Cesudesk\Triagem\TriagemService;
use App\Cesudesk\Triagem\TriagemServiceContract;

use App\Cesudesk\Triagem\TriagemRepository;
use App\Cesudesk\Triagem\TriagemRepositoryContract;


class TriagemServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Cesudesk\Triagem';

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
        $this->app->bind(TriagemServiceContract::class,TriagemService::class);
        $this->app->bind(TriagemRepositoryContract::class,TriagemRepository::class);
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
            require app_path('Cesudesk/Triagem/routes.php');
        });

    }
}
