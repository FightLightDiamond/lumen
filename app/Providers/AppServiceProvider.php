<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tymon\JWTAuth\Providers\LumenServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LumenServiceProvider::class);
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
        //$this->app->register(\Prettus\Repository\Providers\LumenRepositoryServiceProvider::class);
    }
}
