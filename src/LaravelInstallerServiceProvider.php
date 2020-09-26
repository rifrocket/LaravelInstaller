<?php

namespace RifRocket\LaravelInstaller;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use RifRocket\LaravelInstaller\Middleware\canInstall;
use RifRocket\LaravelInstaller\Middleware\canUpdate;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    protected $defer = false;


    public function register()
    {
        $this->publishFiles();
        $this->loadRoutesFrom(__DIR__.'/../src/Routes/web.php');
    }

    public function boot(Router $router)
    {
        $router->middlewareGroup('install', [CanInstall::class]);
        $router->middlewareGroup('update', [CanUpdate::class]);
    }
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__.'/../Config/installer.php' => base_path('config/installer.php'),
        ], 'laravelinstaller');

        $this->publishes([
            __DIR__.'/../assets' => public_path('installer'),
        ], 'laravelinstaller');

        $this->publishes([
            __DIR__.'/../src/Views' => base_path('resources/views/vendor/installer'),
        ], 'laravelinstaller');

        $this->publishes([
            __DIR__.'/../src/Lang' => base_path('resources/lang'),
        ], 'laravelinstaller');
    }

}
