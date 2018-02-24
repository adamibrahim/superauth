<?php

namespace Adam\Superauth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class SuperauthServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        Schema::defaultStringLength(191);
        $this->loadMigrationsFrom( __DIR__.'/database/migrations');
        $this->loadRoutesFrom( __DIR__.'/routes/auth.php');
        $this->loadRoutesFrom( __DIR__.'/routes/admin.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Superauth');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'Superauth');
        $router->aliasMiddleware('moderators', \Adam\Superauth\Middleware\Moderators::class);

        $this->publishes([
            __DIR__.'/Models/User' => app_path(),
            __DIR__.'/resources/lang' => resource_path('lang/vendor/superauth'),
            __DIR__.'/resources/views' => resource_path('views/vendor/superauth'),
            __DIR__.'/redirect_middleware' => app_path('Http/Middleware'),
        ], 'Superauth');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}