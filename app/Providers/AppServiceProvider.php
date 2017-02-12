<?php

namespace App\Providers;

use App\Services\FormatService;
use App\Services\InputService;
use App\Services\UploadService;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Facades\Image;
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
        $this->app->register(\Intervention\Image\ImageServiceProviderLumen::class);
        //$this->app->register(\Prettus\Repository\Providers\LumenRepositoryServiceProvider::class);

        class_alias(Image::class, 'Image');
        $this->app->bind('upload', UploadService::class);
        $this->app->bind('format', FormatService::class);
        $this->app->bind('input', InputService::class);
    }
}
