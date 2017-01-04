<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtCategoriesRepository;
use App\Entities\VtCategories;
use App\Validators\VtCategoriesValidator;

/**
 * Class VtCategoriesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtCategoriesRepositoryEloquent extends BaseRepository implements VtCategoriesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtCategories::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
