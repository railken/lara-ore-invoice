<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Api\Support\Router;
use Railken\Amethyst\Common\CommonServiceProvider;
use Railken\Amethyst\Console\Commands\InvoiceInstallCommand;

class InvoiceServiceProvider extends CommonServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();
        $this->loadExtraRoutes();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Railken\Amethyst\Providers\TaxServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\TaxonomyServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\LegalEntityServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\ListenerServiceProvider::class);
        $this->commands([InvoiceInstallCommand::class]);
    }

    /**
     * Load extra routes.
     */
    public function loadExtraRoutes()
    {
        $config = Config::get('amethyst.invoice.http.admin.invoice');

        if (Arr::get($config, 'enabled')) {
            Router::group('admin', Arr::get($config, 'router'), function ($router) use ($config) {
                $controller = Arr::get($config, 'controller');
                $router->post('/{id}/issue', ['uses' => $controller.'@issue']);
            });
        }
    }
}
