<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:40 PM
 */

namespace App\Providers;


use App\Repositories\VtChartRepository;
use App\Repositories\VtChartRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind(VtChartRepository::class, VtChartRepositoryEloquent::class);
    }
}