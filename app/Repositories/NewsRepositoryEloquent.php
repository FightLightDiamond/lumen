<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Entities\News;
use App\Validators\NewsValidator;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
