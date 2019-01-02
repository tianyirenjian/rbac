<?php

namespace YaroslavMolchan\Rbac;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RbacServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/database/migrations/' => base_path('/database/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/config/rbac.php' => config_path('rbac.php')
        ], 'config');

        Blade::directive('ifUserIs', function($expression){
            return "<?php if(Auth::check() && Auth::user()->hasRole({$expression})): ?>";
        });
        Blade::directive('ifUserCan', function($expression){
            return "<?php if(Auth::check() && Auth::user()->canDo({$expression})): ?>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/rbac.php',
            'rbac'
        );
    }
}
