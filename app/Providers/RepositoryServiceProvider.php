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
use App\Repositories\BannerRepository;
use App\Repositories\BannerRepositoryEloquent;
use App\Repositories\CategoriesRepository;
use App\Repositories\CategoriesRepositoryEloquent;
use App\Repositories\ChartRepository;
use App\Repositories\ChartRepositoryEloquent;
use App\Repositories\FlashHotRepository;
use App\Repositories\FlashHotRepositoryEloquent;
use App\Repositories\NewsRepository;
use App\Repositories\NewsRepositoryEloquent;
use App\Repositories\SingerRepository;
use App\Repositories\SingerRepositoryEloquent;
use App\Repositories\SongRepository;
use App\Repositories\SongRepositoryEloquent;
use App\Repositories\TopicRepository;
use App\Repositories\TopicRepositoryEloquent;
use App\Repositories\VideoRepository;
use App\Repositories\VideoRepositoryEloquent;
use App\Repositories\VocabularyRepository;
use App\Repositories\VocabularyRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(AlbumRepository::class, AlbumRepositoryEloquent::class);
        $this->app->bind(BannerRepository::class, BannerRepositoryEloquent::class);
        $this->app->bind(CategoriesRepository::class, CategoriesRepositoryEloquent::class);
        $this->app->bind(ChartRepository::class, ChartRepositoryEloquent::class);
        $this->app->bind(FlashHotRepository::class, FlashHotRepositoryEloquent::class);
        $this->app->bind(NewsRepository::class, NewsRepositoryEloquent::class);
        $this->app->bind(SingerRepository::class, SingerRepositoryEloquent::class);
        $this->app->bind(SongRepository::class, SongRepositoryEloquent::class);
        $this->app->bind(TopicRepository::class, TopicRepositoryEloquent::class);
        $this->app->bind(VideoRepository::class, VideoRepositoryEloquent::class);
        $this->app->bind(VocabularyRepository::class, VocabularyRepositoryEloquent::class);
    }
}