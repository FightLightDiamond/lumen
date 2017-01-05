<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:40 PM
 */

namespace App\Providers;

use App\Repositories\VtAlbumRepository;
use App\Repositories\VtAlbumRepositoryEloquent;
use App\Repositories\VtChartRepository;
use App\Repositories\VtChartRepositoryEloquent;
use App\Repositories\VtSongRepository;
use App\Repositories\VtSongRepositoryEloquent;
use App\Repositories\VtVideoRepository;
use App\Repositories\VtVideoRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(VtChartRepository::class, VtChartRepositoryEloquent::class);
        $this->app->bind(VtSongRepository::class, VtSongRepositoryEloquent::class);
        $this->app->bind(VtAlbumRepository::class, VtAlbumRepositoryEloquent::class);
        $this->app->bind(VtVideoRepository::class, VtVideoRepositoryEloquent::class);
    }
}