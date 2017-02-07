<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IconRepository;
use App\Entities\Icon;
use App\Validators\IconValidator;

/**
 * class IconRepositoryEloquent
 * @package namespace App\Repositories;
 */
class IconRepositoryEloquent extends BaseRepository implements IconRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Icon::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
