<?php

namespace App\Providers;

use App\Services\FormatService;
use App\Services\UploadService;
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
        $this->app->bind('upload', UploadService::class);
        $this->app->bind('format', FormatService::class);
    }
}
