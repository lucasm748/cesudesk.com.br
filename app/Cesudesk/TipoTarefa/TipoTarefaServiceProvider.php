<?php

namespace App\Cesudesk\TipoTarefa;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Cesudesk\TipoTarefa\TipoTarefaService;
use App\Cesudesk\TipoTarefa\TipoTarefaServiceContract;

use App\Cesudesk\TipoTarefa\TipoTarefaRepository;
use App\Cesudesk\TipoTarefa\TipoTarefaRepositoryContract;


class TipoTarefaServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Cesudesk\TipoTarefa';

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
        $this->app->bind(TipoTarefaServiceContract::class,TipoTarefaService::class);
        $this->app->bind(TipoTarefaRepositoryContract::class,TipoTarefaRepository::class);
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
            require app_path('Cesudesk/TipoTarefa/routes.php');
        });

    }
}
