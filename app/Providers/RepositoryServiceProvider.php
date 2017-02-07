<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:40 PM
 */

namespace App\Providers;

use App\Repositories\AlbumRepository;
use App\Repositories\AlbumRepositoryEloquent;
use App\Repositories\ChartRepository;
use App\Repositories\ChartRepositoryEloquent;
use App\Repositories\OfferSetupsRepository;
use App\Repositories\OfferSetupsRepositoryEloquent;
use App\Repositories\SingerRepository;
use App\Repositories\SingerRepositoryEloquent;
use App\Repositories\SongRepository;
use App\Repositories\SongRepositoryEloquent;
use App\Repositories\VideoRepository;
use App\Repositories\VideoRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(AlbumRepository::class, AlbumRepositoryEloquent::class);
        $this->app->bind(ChartRepository::class, ChartRepositoryEloquent::class);
        $this->app->bind(SingerRepository::class, SingerRepositoryEloquent::class);
        $this->app->bind(SongRepository::class, SongRepositoryEloquent::class);
        $this->app->bind(OfferSetupsRepository::class, OfferSetupsRepositoryEloquent::class);
        $this->app->bind(VideoRepository::class, VideoRepositoryEloquent::class);
    }
}